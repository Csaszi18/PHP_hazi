<?php

abstract class AbstractLibrary
{
    /**
     * @var Author[]
     */
    private $authors = [];

    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function setAuthors(array $authors): void
    {
        $this->authors = $authors;
    }

    abstract public function addAuthor(string $authorName): Author;

    abstract public function addBookForAuthor($authorName, Book $book);

    abstract public function getBooksForAuthor($authorName);

    abstract public function search(string $bookName): ?Book;

    abstract public function print();
}
