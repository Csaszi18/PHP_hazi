<?php
// JSON adat
$jsonData = '[
    {
        "title": "The Catcher in the Rye",
        "author": "J.D. Salinger",
        "publication_year": 1951,
        "category": "Fiction"
    },
    {
        "title": "To Kill a Mockingbird",
        "author": "Harper Lee",
        "publication_year": 1960,
        "category": "Fiction"
    },
    {
        "title": "1984",
        "author": "George Orwell",
        "publication_year": 1949,
        "category": "Dystopian"
    },
    {
        "title": "The Great Gatsby",
        "author": "F. Scott Fitzgerald",
        "publication_year": 1925,
        "category": "Fiction"
    },
    {
        "title": "Brave New World",
        "author": "Aldous Huxley",
        "publication_year": 1932,
        "category": "Dystopian"
    }
]';

// JSON dekódolása PHP tömbbé
$books = json_decode($jsonData, true);

// Könyvek kategóriák szerint rendezése
$booksByCategory = [];
foreach ($books as $book) {
    $category = $book['category'];
    $booksByCategory[$category][] = $book;
}

// HTML táblázat generálása
echo '<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Könyvek táblázat</title>
</head>
<body>
    <h3>Könyvek kategóriák szerint</h3>';

echo '<table border="1" cellpadding="10" cellspacing="0">';
foreach ($booksByCategory as $category => $books) {
    echo '<tr><th colspan="3">' . htmlspecialchars($category) . '</th></tr>';
    echo '<tr><th>Cím</th><th>Szerző</th><th>Kiadási év</th></tr>';
    foreach ($books as $book) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($book['title']) . '</td>';
        echo '<td>' . htmlspecialchars($book['author']) . '</td>';
        echo '<td>' . htmlspecialchars($book['publication_year']) . '</td>';
        echo '</tr>';
    }
}
echo '</table>';

echo '</body></html>';
?>
