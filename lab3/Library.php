<?php

require_once "AbstractLibrary.php";
require_once "Author.php";
require_once "Book.php";

class Library extends AbstractLibrary
{
    private array $authors = [];

    public function addAuthor(string $authorName): Author
    {
        $author = new Author($authorName);
        $this->authors[$authorName] = $author;
        return $author;
    }

    public function addBookForAuthor($authorName, Book $book)
    {
        if (!isset($this->authors[$authorName])) {
            $this->addAuthor($authorName);
        }
        $author = $this->authors[$authorName];
        $author->addBook($book->getTitle(), $book->getPrice());
        $book->setAuthor($author);
    }

    public function getBooksForAuthor($authorName)
    {
        return $this->authors[$authorName]->getBooks() ?? [];
    }

    public function search(string $bookName): ?Book
    {
        foreach ($this->authors as $author) {
            foreach ($author->getBooks() as $book) {
                if ($book->getTitle() === $bookName) {
                    return $book;
                }
            }
        }
        return null;
    }

    public function print()
    {
        foreach ($this->authors as $author) {
            echo $author->getName() . "\n";
            echo "----------------------\n";
            foreach ($author->getBooks() as $book) {
                echo $book->getTitle() . " - " . $book->getPrice() . "\n";
            }
            echo "\n";
        }
    }
}
