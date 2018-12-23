<?php

declare(strict_types=1);

namespace App\Model;

class BookModel extends BaseModel
{
    private $books;
    public function __construct()
    {
        $this->books = [
            1 => [
                'id' => 1,
                'isbn' => 9780132350884,
                'title' => 'Clean Code',
                'subtitle' => 'A Handbook of Agile Software Craftmanship',
                'author' => 'Robert C. Martin',
                'price' => 35.95,
                'pages' => 464,
                'publisher' => 'Pearson Education',
                'description' => "Even bad code can function. But if code isn't clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code. But it doesn't have to be that way.",
                'image' => 'book-clean-code.jpg'
            ],
            2 => [
                'id' => 2,
                'isbn' => 9781449344917,
                'title' => 'Learning PHP Design Patterns',
                'subtitle' => '',
                'author' => 'William Sanders',
                'price' => 29.99,
                'pages' => 350,
                'publisher' => "O\'Reilly Media",
                'description' => 'Build server-side applications more efficiently and improve your PHP programming skills in the process by learning how to use design patterns in your code. This book shows you how to apply several object-oriented patterns through simple examples, and demonstrates many of them in full-fledged working applications.',
                'image' => 'book-learning-php-design-patterns.jpg'
            ],
            3 => [
                'id' => 3,
                'isbn' => 9780321965516,
                'title' => "Don't make me think",
                'subtitle' => 'A Common Sense Approach to Web Usability',
                'author' => 'Steve Krug',
                'price' => 43.99,
                'pages' => 216,
                'publisher' => "Pearson Education",
                'description' => "Since Don't Make Me Think was first published in 2000, hundreds of thousands of Web designers and developers have relied on usability guru Steve Krug's guide to help them understand the principles of intuitive navigation and informationdesign. Witty, commonsensical, and eminently practical, it's one of the best-loved and most recommended books on the subject. Now Steve returns with fresh perspective to reexamine the principles that made Don't Make Me Think a classic-with updated examplesand a new chapter on mobile usability.",
                'image' => 'book-dont-make-me-think.jpg'
            ]
        ];
    }

    public function getAllBooks() : array
    {
        $query = "SELECT
                  books.id, books.title, books.isbn, books.price, authors.name AS authorName
                  FROM 
                    books
                    LEFT JOIN authors ON (authors.id = books.author_id)";

        $statement = $this->getConnection()->prepare($query);
        $statement->execute();
        $books = $statement->fetchAll();
        return $books;
    }

    public function getOneBook(int $bookID) : ?array
    {
        $query = "SELECT books.*,
                  authors.name AS authorName,
                  publishers.name AS publisherName
                  FROM books 
                      LEFT JOIN authors ON (authors.id = books.author_id)
                      LEFT JOIN publishers ON (publishers.id = books.publisher_id)
                      WHERE books.id = :id";

        $statement = $this->getConnection()->prepare($query);
        $parameters = [
            'id' => $bookID
        ];

        $statement->execute($parameters);

        if ($statement -> rowCount() > 0) {
            return $statement->fetch();
        }
        return null;

    }


    public function createBook(array $book) : int
    {
        $query = "INSERT
                  INTO books 
                  (
                  title,
                  subtitle,
                  isbn,
                  author_id,
                  publisher_id,
                  description,
                  price,
                  pages, 
                  image
                  )
                  VALUES 
                  (
                  :title,
                  :subtitle,
                  :isbn,
                  :author_id,
                  :publisher_id,
                  :description,
                  :price,
                  :pages, 
                  :image
                  )";

        $parameters = [
            'title' => $book['title'],
            'subtitle' => $book['subtitle'],
            'isbn' => $book['isbn'],
            'author_id' => $book['author_id'],
            'publisher_id' => $book['publisher_id'],
            'description' => $book['description'],
            'price'=> $book['price'],
            'pages'=> $book['pages'],
            'image'=> $book['image_filename']
        ];

        $statement = $this->getConnection()->prepare($query);
        $statement->execute($parameters);

        return (int) $this->getConnection()->lastInsertId();
    }

    public function updateBook(int $id, array $book) : void
    {
        $query = "UPDATE
                    books
                  SET 
                  title =:title,
                  subtitle = :subtitle,
                  isbn = :isbn, 
                  author_id = :author_id, 
                  publisher_id = :publisher_id,
                  description = :description,
                  price = :price,
                  pages = :pages,
                  image = :image
                      
                   WHERE id = :id";

        $statement = $this->getConnection()->prepare($query);
        $parameters = array(
            'id' => $id,
            'title' => $book['title'],
            'subtitle' => $book['subtitle'],
            'isbn' => $book['isbn'],
            'author_id' => $book['author_id'],
            'publisher_id' => $book['publisher_id'],
            'description' => $book['description'],
            'price'=> $book['price'],
            'pages'=> $book['pages'],
            'image'=> $book['image_filename']
        );
        $statement->execute($parameters);

    }

    public function deleteBook($id)
    {
        $query = "DELETE FROM books 
                  WHERE id = :id";

        $statement = $this->getConnection()->prepare($query);
        $parameters = [
            'id' => $id
        ];
        $statement->execute($parameters);
    }
}

