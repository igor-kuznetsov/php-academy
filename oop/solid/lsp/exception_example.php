<?php

namespace lessons\oop\solid\lsp;

use Exception;

/**
 * Class VideoPlayer
 * @package lessons\oop\solid\lsp
 */
class VideoPlayer
{
    /**
     * @param $file
     */
    public function play($file)
    {
        // play video
    }
}

/**
 * Class AviVideoPlayer
 * @package lessons\oop\solid\lsp
 */
class AviVideoPlayer extends VideoPlayer
{
    /**
     * @param $file
     * @throws Exception
     */
    public function play($file)
    {
        if ('avi' != pathinfo($file, PATHINFO_EXTENSION)) {
            throw new Exception('Error: Only AVI is allowed!'); // violates LSP
        }

        // play avi play
    }
}