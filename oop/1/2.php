<?php

/**
 * Class Article
 */
class Article
{
    public $author;
    public $title = 'Default Title';
    public $content;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

//    public function wrongUseOfThis()
//    {
//        $this = 10;
//
//        return $this;
//    }
}

$article1 = new Article();
$article2 = new Article();

$article1->title = 'Article 1 Title';
$article1->author = 'Article 1 Author';
$article1->content = 'Article 1 Content';

print("<pre>");
print_r($article1);
print("</pre>");

echo "<hr>";
var_dump($article1->getTitle());
echo "<hr>";
var_dump($article2->getTitle());