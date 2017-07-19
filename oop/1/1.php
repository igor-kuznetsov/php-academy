<?php

/**
 * Class Author
 */
class Author
{
    //
}

/**
 * Class Book
 */
class Book
{
    //
}

$author1 = new Author();
$author2 = new Author();
$book1 = new Book();

var_dump($author1);

echo "<hr>";

var_dump($author1 instanceof Author);

echo "<hr>";

var_dump($book1 instanceof Author);