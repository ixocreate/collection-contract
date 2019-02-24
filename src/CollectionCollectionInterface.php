<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Contract\Collection;

interface CollectionCollectionInterface
{
    /**
     * @return array
     */
    public function getCollections(): array;

    /**
     * @return \Iterator
     */
    public function getCollectionIterator(): \Iterator;

    /**
     * @return int
     */
    public function getCollectionCount(): int;
}
