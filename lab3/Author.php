<?php

class Author
{
    public string $name;
    public array $books;

    public function __construct(string $name, array $books = [])
    {
        $this->name = $name;
        $this->books = $books;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBooks(): array
    {
        return $this->books;
    }

    public function setBooks(array $books): void
    {
        $this->books = $books;
    }

    public function addBook(string $title, float $price): Book
    {
        $book = new Book($title, $price);
        $book->setAuthor($this);
        $this->books[] = $book;
        return $book;
    }
}
