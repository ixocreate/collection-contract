<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Contract\Collection;

use Ixocreate\Collection\Exception\EmptyException;

interface CollectionInterface extends \Countable, \IteratorAggregate
{
    /**
     * Returns all collection items
     *
     * @return array
     */
    public function all(): array;

    /**
     * Returns all keys of the collection items
     *
     * @return array
     */
    public function keys(): array;

    /**
     * Executes a callable over each collection item
     *
     * @param callable $callable
     */
    public function each(callable $callable): void;

    /**
     * Checks if the current collection is empty
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Returns the average of a given selector
     *
     * @param callable|string|int $selector
     * @throws EmptyException
     * @return float
     */
    public function avg($selector): float;

    /**
     * Returns the sum of a given selector
     *
     * @param callable|string|int $selector
     * @return float
     */
    public function sum($selector): float;

    /**
     * Returns the minimum value of a given selector
     *
     * @param callable|string|int $selector
     * @throws EmptyException
     * @return CollectionInterface
     */
    public function min($selector): CollectionInterface;

    /**
     * Returns the maximum value of a given selector
     *
     * @param callable|string|int $selector
     * @throws EmptyException
     * @return CollectionInterface
     */
    public function max($selector): CollectionInterface;

    /**
     * Iteratively reduce the array to a single value using a callback function
     *
     * @param callable $callable
     * @param mixed $initial
     * @return mixed
     */
    public function reduce(callable $callable, $initial = null);

    /**
     * Return a collection of items which are different between the given collection and the current collection
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function diff(CollectionInterface $collection): CollectionInterface;

    /**
     * Return a collection of intersecting collection items
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function intersect(CollectionInterface $collection): CollectionInterface;

    /**
     * Filter the collection by a given callable and return the result as new collection
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function filter(callable $callable): CollectionInterface;

    /**
     * Sorts the current collection based on a given callable
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function sort(callable $callable): CollectionInterface;

    /**
     * Merge another collection into the current collection and returns as new collection
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function merge(CollectionInterface $collection): CollectionInterface;

    /**
     * Chunk the collection items and return them as a collection
     *
     * @param int $size
     * @return CollectionCollectionInterface
     */
    public function chunk(int $size): CollectionCollectionInterface;

    /**
     * Split the collection into groups and return them as a collection
     *
     * @param int $groups
     * @return CollectionCollectionInterface
     */
    public function split(int $groups): CollectionCollectionInterface;

    /**
     * Return a new collection of every n-th element
     *
     * @param int $step
     * @param int $offset
     * @return CollectionInterface
     */
    public function nth(int $step, $offset = 0): CollectionInterface;

    /**
     * Shuffles and returns collection items
     *
     * @return CollectionInterface
     */
    public function shuffle(): CollectionInterface;

    /**
     * Returns a sequence of collection items as collection interface specified by offset and length
     *
     * @param int $offset
     * @param int|null $length
     * @return CollectionInterface
     */
    public function slice(int $offset, int $length = null): CollectionInterface;

    /**
     * Returns a collection in reverse order
     *
     * @return CollectionInterface
     */
    public function reverse(): CollectionInterface;

    /**
     * Returns an array of all values of a given selector
     *
     * @param callable|string|int $selector
     * @return array
     */
    public function parts($selector): array;

    /**
     * Returns one collection item based on a given key
     *
     * @param string|int $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Checks if an collection item exists based on a given selector
     *
     * @param string|int $key
     * @return bool
     */
    public function has($key): bool;

    /**
     * Returns one random collection item
     *
     * @return mixed
     */
    public function random();

    /**
     * Returns the first collection item or the first collection item matched by a given callable
     *
     * @param callable|null $callable
     * @return mixed
     */
    public function first(callable $callable = null);

    /**
     * Returns the last collection item or the last collection item matched by a given callable
     *
     * @param callable|null $callable
     * @return mixed
     */
    public function last(callable $callable = null);

    /**
     * Removes and returns the last collection item
     *
     * @return mixed
     */
    public function pop();

    /**
     * Removes and returns the first collection item
     *
     * @return mixed
     */
    public function shift();

    /**
     * Removes and returns all items filtered by a given callable
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function pull(callable $callable): CollectionInterface;

    /**
     * Adds an item at the beginning of the current collection
     *
     * @param mixed $item
     */
    public function prepend($item): void;

    /**
     * Adds an item at the end of the current collection
     *
     * @param mixed $item
     */
    public function push($item): void;
}
