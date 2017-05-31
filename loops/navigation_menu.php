<?php
$nav = [
    [
        'name' => 'Home',
        'href' => '/home',
        'pages' => []
    ],
    [
        'name' => 'About',
        'href' => '/about',
        'pages' => []
    ],
    [
        'name' => 'Articles',
        'href' => '/articles',
        'pages' => [
            [
                'name' => 'Article 1',
                'href' => '/articles/article-1',
                'pages' => []
            ],
            [
                'name' => 'Article 2',
                'href' => '/articles/article-2',
                'pages' => []
            ],
            [
                'name' => 'Article 3',
                'href' => '/articles/article-3',
                'pages' => []
            ],
        ]
    ],
];
?>
<nav>
    <ul>
        <?php
        foreach ($nav as $item) {
            echo '<li>';
            echo '<a href="' . $item['href'] . '">';
            echo $item['name'];
            echo '</a>';

            if ( ! empty($item['pages'])) {
                echo '<ul>';
                foreach ($item['pages'] as $page) {
                    echo '<li>';
                    echo '<a href="' . $page['href'] . '">';
                    echo $page['name'];
                    echo '</a>';
                    echo '</li>';
                }
                echo '</ul>';
            }

            echo '</li>';
        }
        ?>
    </ul>
</nav>