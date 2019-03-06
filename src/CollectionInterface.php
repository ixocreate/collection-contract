<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Contract\Collection;

use Ixocreate\Collection\Exception\EmptyCollection;
use Ixocreate\Collection\Exception\InvalidReturnValue;

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
     * Returns a lazy collection with items from all $pushItems pushed.
     * Resets all keys to make sure everything gets added.
     *
     * @param iterable $pushItems
     * @return CollectionInterface
     */
    public function concat(iterable $pushItems): CollectionInterface;

    /**
     * Returns true if $value is present in the collection.
     * Like in_array() but with $strict by default.
     *
     * @param mixed $needle
     * @return bool
     */
    public function contains($needle): bool;

    /**
     * Returns a non-lazy collection of items whose keys are the return values of $callable and values are the number of
     * items in this collection for which the $callable returned this value.
     *
     * @param callable|string|int $selector
     * @return CollectionInterface
     */
    public function countBy($selector): CollectionInterface;

    /**
     * Returns a lazy collection of items that are in $this but are not in any of the other arguments, indexed by the
     * keys from the first collection. Note that collections are iterated non-lazily.
     *
     * @param iterable $compare
     * @return CollectionInterface
     */
    public function diff(iterable $compare): CollectionInterface;

    /**
     * Returns a lazy collection of distinct items. The comparison is the same as in in_array.
     *
     * @return CollectionInterface
     */
    public function distinct(): CollectionInterface;

    /**
     * Returns a lazy collection in which $callable is executed for each item.
     *
     * @param callable $callable ($value, $key)
     * @return CollectionInterface
     */
    public function each(callable $callable): CollectionInterface;

    /**
     * Returns true if $callable returns true for every item in this collection, false otherwise.
     *
     * @param callable $callable
     * @return bool
     */
    public function every(callable $callable);

    /**
     * Returns a lazy collection without the items associated to any of the keys from $keys.
     *
     * @param iterable $keys
     * @return CollectionInterface
     */
    public function except(iterable $keys): CollectionInterface;

    /**
     * Extracts data from collection items.
     *
     * @param callable|string|int $selector
     * @return CollectionInterface
     */
    public function extract($selector): CollectionInterface;

    /**
     * Returns a lazy collection of items for which $callable returned true.
     *
     * @param callable $callable ($value, $key)
     * @return CollectionInterface
     */
    public function filter(callable $callable): CollectionInterface;

    /**
     * Returns first value matched by $callable. If no value matches, return $default.
     *
     * @param callable $callable
     * @param mixed $default
     * @return mixed
     */
    public function find(callable $callable, $default = null);

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
     * Returns a lazy collection where keys and values are flipped.
     *
     * @return CollectionInterface
     */
    public function flip(): CollectionInterface;

    /**
     * Returns a collection where keys are distinct items from this collection and their values are number of
     * occurrences of each value.
     * Counts items by value.
     *
     * @return CollectionInterface
     */
    public function frequencies(): CollectionInterface;

    /**
     * Returns value at the key $key. If multiple values have this key, return first.
     * If no value has this key, return $default.
     *
     * @param string|int $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Returns collection which items are separated into groups indexed by the return value of $selector.
     *
     * @param callable|string|int $selector
     * @return CollectionInterface
     */
    public function groupBy($selector): CollectionInterface;

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
     * Returns a lazy collection of items that are in this and $compare, indexed by the keys from
     * the first collection. Note that $compare are iterated non-lazily.
     *
     * @param iterable $compare
     * @return CollectionInterface
     */
    public function intersect(iterable $compare): CollectionInterface;

    /**
     * Returns true if this collection is empty. False otherwise.
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Opposite of isEmpty.
     *
     * @return bool
     */
    public function isNotEmpty(): bool;

    /**
     * Returns a lazy collection of the keys of this collection.
     *
     * @return CollectionInterface
     */
    public function keys(): CollectionInterface;

    /**
     * Returns last item of this collection.
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
     * @param callable|string|int|null $selector
     * @return int|float
     */
    public function max($selector);

    /**
     * Returns median value of a given selector
     *
     * @param callable|string|int|null $selector
     * @return int|float
     */
    public function median($selector);

    /**
     * Merge iterable $items into the current collection and return as new collection.
     * Behaviour matches array_merge https://secure.php.net/manual/en/function.array-merge.php
     *
     * @param iterable $items
     * @return CollectionInterface
     */
    public function merge(iterable $items): CollectionInterface;

    /**
     * Returns the minimum value of a given selector
     *
     * @param callable|string|int|null $selector
     * @return int|float
     */
    public function min($selector);

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
     * Returns a lazy collection of items of this collection with $value added at/with given $key and/or as last element.
     * If $key is not provided it will be next integer index.
     * Behaviour matches https://secure.php.net/manual/en/function.array-rand.php but only allows one item to be pushed.
     * To push multiple items at once use concat()
     *
     * @param mixed $value
     * @param string|int|null $key
     * @return CollectionInterface
     */
    public function push($value, $key = null): CollectionInterface;

    /**
     * Returns a lazy collection of items of this collection with $value added at/with given $key.
     * If $key is not provided it will be next integer index.
     *
     * @param mixed $value
     * @param string|int $key
     * @return CollectionInterface
     */
    public function put($value, $key): CollectionInterface;

    /**
     * Returns one or many random collection items as a collection.
     * Behaviour matches https://secure.php.net/manual/en/function.array-rand.php
     *
     * @param int|null $number Specifies how many random keys to return
     * @return CollectionInterface
     */
    public function random(int $number = 1);

    /**
     * Reduces the collection to single value by iterating over the collection and calling $callable while
     * passing $initial and current key/item as parameters. The output of $callable is used as $initial in
     * next iteration. The output of $callable on last element is the return value of this function.
     * Behaviour matches https://secure.php.net/manual/en/function.array-reduce.php
     *
     * @param callable $callable ($carry, $value, $key)
     * @param mixed $initial
     * @return mixed
     */
    public function reduce(callable $callable, $initial = null);

    /**
     * Returns a lazy collection without elements matched by $callable.
     *
     * @param callable $callable
     * @return CollectionInterface
     */
    public function reject(callable $callable): CollectionInterface;

    /**
     * Returns a collection in reverse order.
     * Behaviour matches https://secure.php.net/manual/en/function.array-reverse.php with $preserve_keys=true
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
     * Returns a sequence of collection items as collection interface specified by offset and length.
     *
     * @param int $offset
     * @param int|null $length
     * @return CollectionInterface
     */
    public function slice(int $offset, int $length = null): CollectionInterface;

    /**
     * Returns true if $callable returns true for at least one item in this collection, false otherwise.
     *
     * @param callable $callable
     * @return bool
     */
    public function some(callable $callable): bool;

    /**
     * Returns a non-lazy collection sorted using $callable. $callable should
     * return true if first item is larger than the second and false otherwise.
     * Sorts by value if $callable is not set.
     *
     * @param callable|null $callable ($value1, $value2, $key1, $key2)
     * @return CollectionInterface
     */
    public function sort($callable = null): CollectionInterface;

    /**
     * @param callable|string|int $selector
     * @return CollectionInterface
     */
    public function sortBy($selector): CollectionInterface;

    /**
     * Returns a non-lazy collection sorted using keys.
     *
     * @return CollectionInterface
     */
    public function sortByKeys(): CollectionInterface;

    /**
     * Split the collection into groups and return them as a collection of collections.
     *
     * @param int $groups
     * @param bool $preserveKeys
     * @return CollectionInterface
     */
    public function split(int $groups, bool $preserveKeys = true): CollectionInterface;

    /**
     * Returns a sum of all values in this collection by a given selector or its scalar values by default.
     *
     * @param callable|string|int|null $selector
     * @return int|float
     */
    public function sum($selector = null);

    /**
     * A form of slice that returns first $numberOfItems items.
     *
     * @param int $numberOfItems
     * @return CollectionInterface
     */
    public function take($numberOfItems): CollectionInterface;

    /**
     * Returns a lazy collection of every nth item in this collection
     *
     * @param int $step
     * @param mixed $offset
     * @return CollectionInterface
     */
    public function takeNth($step, $offset = 0): CollectionInterface;

    /**
     * Converts collection to array. If there are multiple items with the same key, only the last will be preserved.
     * To make sure all items are returned when duplicate keys are present call values() before calling toArray().
     * By setting expectUniqueKeys(true) a DuplicateKey exception would be thrown in case there are any dupes.
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Uses a $transformer callable that takes a Collection and returns Collection on itself.
     *
     * @param callable $transformer Collection => Collection
     * @throws InvalidReturnValue
     * @return CollectionInterface
     */
    public function transform(callable $transformer): CollectionInterface;

    /**
     * Transpose each item in a collection, interchanging the row and column indexes.
     * Can only transpose collections of collections. Otherwise an InvalidArgument is raised.
     *
     * @return CollectionInterface
     */
    public function transpose(): CollectionInterface;

    /**
     * Returns a lazy collection of items of this collection with $value added at/with give $key and/or as first element.
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

    /**
     * Returns a lazy collection of non-lazy collections of items from nth position from this collection and each
     * item of $values. Stops when $values doesn't have an item at the nth position.
     *
     * @param iterable $values
     * @return CollectionInterface
     */
    public function zip(iterable $values): CollectionInterface;
}
