<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Contract\Collection;

use Ixocreate\Collection\Collection;
use Ixocreate\Collection\Exception\EmptyCollection;

interface CollectionInterface extends \Countable, \Iterator, \JsonSerializable
{
    /**
     * Returns average (arithmetic mean) of values from this collection.
     *
     * @param callable|string|int|null $selector
     * @throws EmptyCollection
     * @return int|float
     */
    public function avg($selector = null);

    /**
     * Chunk the collection items and return them as a collection of collections.
     *
     * @param int $size
     * @param bool $preserveKeys
     * @return CollectionInterface
     */
    public function chunk(int $size, bool $preserveKeys = true): CollectionInterface;

    /**
     * Returns a lazy collection with items from all $collections passed as argument appended together
     *
     * @param array|\Traversable ...$collections
     * @return CollectionInterface
     */
    public function concat(...$collections): CollectionInterface;

    /**
     * Returns true if $value is present in the collection.
     * Like in_array() but with $strict by default.
     *
     * @param mixed $needle
     * @return bool
     */
    public function contains($needle): bool;

    /**
     * Returns a lazy collection of items that are in $this but are not in any of the other arguments, indexed by the
     * keys from the first collection. Note that the ...$collections are iterated non-lazily.
     *
     * @param array|\Traversable ...$collections
     * @return CollectionInterface
     */
    public function diff(...$collections): CollectionInterface;

    /**
     * Returns a lazy collection of distinct items. The comparison is the same as in in_array.
     *
     * @return CollectionInterface
     */
    public function distinct(): CollectionInterface;

    /**
     * Executes a callable over each collection item
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function each(callable $callable): CollectionInterface;

    /**
     * Extracts data from collection items.
     *
     * @alias
     * @param callable|string|int $selector
     * @return Collection
     */
    public function extract($selector): CollectionInterface;

    /**
     * Filter the collection by a given callable and return the result as new collection
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function filter(callable $callable): CollectionInterface;

    /**
     * Returns first item of this collection.
     *
     * @return mixed
     */
    public function first();

    /**
     * Returns a lazy collection with one or multiple levels of nesting flattened.
     * Removes all nesting when no value is passed.
     *
     * @param int $depth how many levels should be flatten, default (-1) is infinite
     * @return CollectionInterface
     */
    public function flatten(int $depth = -1): CollectionInterface;

    /**
     * Returns one collection item based on a given key
     *
     * @param string|int $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Returns collection which items are separated into groups indexed by the return value of $callable.
     *
     * @param callable $callable ($value, $key)
     * @return CollectionInterface
     */
    public function groupBy(callable $callable): CollectionInterface;

    /**
     * Returns collection where items are separated into groups indexed by the value at given key.
     *
     * @param string|int $key
     * @return CollectionInterface
     */
    public function groupByKey($key): CollectionInterface;

    /**
     * Checks for the existence of an item with $key in this collection.
     *
     * @param string|int $key
     * @return bool
     */
    public function has($key): bool;

    /**
     * Implodes values by concatenating the collection values into a string.
     *
     * @param string $glue
     * @param callable|string|int $selector
     * @return string
     */
    public function implode($glue = ', ', $selector = null);

    /**
     * Returns a lazy collection by changing keys of this collection for each item to the result of $selector.
     *
     * @param callable|string|int $selector
     * @return CollectionInterface
     */
    public function indexBy($selector): CollectionInterface;

    /**
     * Returns a lazy collection of items that are in $this and all the other arguments, indexed by the keys from
     * the first collection. Note that the ...$collections are iterated non-lazily.
     *
     * @param array|\Traversable ...$collections
     * @return CollectionInterface
     */
    public function intersect(...$collections): CollectionInterface;

    /**
     * Checks if the current collection is empty
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Returns all keys of the collection items
     *
     * @return CollectionInterface
     */
    public function keys(): CollectionInterface;

    /**
     * Returns last item of this collection. If the collection is empty, throws ItemNotFound.
     *
     * @return mixed
     */
    public function last();

    /**
     * Returns collection where each item is changed to the output of executing $callable on each key/item.
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function map(callable $callable): CollectionInterface;

    /**
     * Returns the maximum value of a given selector
     *
     * @param callable|string|int $selector
     * @return CollectionInterface
     */
    public function max($selector): CollectionInterface;

    /**
     * Merge another collection into the current collection and returns as new collection
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function merge(CollectionInterface $collection): CollectionInterface;

    /**
     * Returns the minimum value of a given selector
     *
     * @param callable|string|int $selector
     * @return CollectionInterface
     */
    public function min($selector): CollectionInterface;

    /**
     * Return a new collection of every n-th element
     *
     * @param int $step
     * @param int $offset
     * @return CollectionInterface
     */
    public function nth(int $step, $offset = 0): CollectionInterface;

    /**
     * Removes and returns the last collection item
     *
     * @return mixed
     */
    public function pop();

    /**
     * Removes and returns all items filtered by a given callable
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function pull(callable $callable): CollectionInterface;

    /**
     * Returns a lazy collection of items of this collection with $value added as last element.
     * If $key is not provided it will be next integer index.
     *
     * @param mixed $value
     * @param mixed $key
     * @return CollectionInterface
     */
    public function push($value, $key = null): CollectionInterface;

    /**
     * Returns one random collection item
     *
     * @return mixed
     */
    public function random();

    /**
     * Reduces the collection to single value by iterating over the collection and calling $callable while
     * passing $initial and current key/item as parameters. The output of $callable is used as $initial in
     * next iteration. The output of $callable on last element is the return value of this function.
     *
     * @param callable $callable ($carry, $value, $key)
     * @param mixed $initial
     * @return mixed
     */
    public function reduce(callable $callable, $initial = null);

    /**
     * Returns a collection in reverse order
     *
     * @return CollectionInterface
     */
    public function reverse(): CollectionInterface;

    /**
     * Removes and returns the first collection item
     *
     * @return mixed
     */
    public function shift();

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
     * Sorts the current collection based on a given callable
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function sort(callable $callable): CollectionInterface;

    /**
     * Split the collection into groups and return them as a collection of collections.
     *
     * @param int $groups
     * @param bool $preserveKeys
     * @return CollectionInterface
     */
    public function split(int $groups, bool $preserveKeys = true): CollectionInterface;

    /**
     * Returns the sum of a given selector
     *
     * @param callable|string|int|null $selector
     * @return int|float
     */
    public function sum($selector = null);

    /**
     * Converts collection to array. If there are multiple items with the same key, only the last will be preserved.
     * To make sure all items are returned when duplicate keys are present call values() before calling toArray().
     * By setting expectUniqueKeys(true) a DuplicateKey exception would be thrown in case there are any dupes.
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Returns a lazy collection of items of this collection with $value added as first element.
     * If $key is not provided it will be next integer index.
     *
     * @param mixed $value
     * @param mixed $key
     * @return CollectionInterface
     */
    public function unshift($value, $key = null): CollectionInterface;

    /**
     * Returns a lazy collection of values (i.e. the keys are reset).
     *
     * @return CollectionInterface
     */
    public function values(): CollectionInterface;
}
