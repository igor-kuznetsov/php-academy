<?php

namespace lessons\oop\solid\lsp;

/**
 * Interface RepositoryInterface
 * @package lessons\oop\solid\lsp
 */
interface RepositoryInterface
{
    public function getAll();
}

/**
 * Class FileRepository
 * @package lessons\oop\solid\lsp
 */
class FileRepository implements RepositoryInterface
{
    /**
     * @return array
     */
    public function getAll()
    {
        return [];
    }
}

/**
 * Class DatabaseRepository
 * @package lessons\oop\solid\lsp
 */
class DatabaseRepository implements RepositoryInterface
{
    /**
     * @return DatabaseCollection
     */
    public function getAll()
    {
        return new DatabaseCollection();
    }
}

/**
 * Class DatabaseCollection
 * @package lessons\oop\solid\lsp
 */
class DatabaseCollection
{
    //
}

/**
 * Class Test
 * @package lessons\oop\solid\lsp
 */
class Test
{
    /**
     * @param RepositoryInterface $repo
     */
    public function __construct(RepositoryInterface $repo)
    {
        $all = $repo->getAll(); // ATTENTION: different types!
    }
}