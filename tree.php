<?php

class Item
{

    private $item = [];

    public function __construct($id, $pid, $value)
    {
        $this->item = [
            'id' => $id,
            'pid' => $pid,
            'value' => $value
        ];
    }

    public function getId()
    {
        return $this->item['id'];
    }

    public function getItem()
    {
        return $this->item;
    }
}

class Tree
{

    private $items = [];

    public function __construct($items = [])
    {
        foreach ($items as $item) {
            if ($item instanceof Item) {
                $this->addItemWithCache($item);
            }
        }
    }

    public function addItemWithCache(Item $item)
    {
        $this->addItem($item);
        
        $this->addCache($item);
    }

    public function addItem(Item $item)
    {
        $this->items[$item->getId()] = $item->getItem();
    }

    public function addCache(Item $item)
    {
        file_put_contents($this->getCachePath($item->getId()), serialize($item->getItem()), LOCK_EX);
    }

    public function getTreeWithCache()
    {
        if ($this->items == null) {
            $this->items = $this->getCache();
        }
        return $this->getTree();
    }

    public function getTree()
    {
        $items = $this->items;
        $tree = array();
        foreach ($items as $item) {
            if (isset($items[$item['pid']])) {
                $items[$item['pid']]['son'][] = &$items[$item['id']];
            } else {
                $tree[] = &$items[$item['id']];
            }
        }
        return $tree;
    }

    public function getCache()
    {
        $files = scandir($this->getCacheRoot());
        
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $pathinfo = pathinfo($file);
            if ($pathinfo['extension'] == 'data') {
                $items[$pathinfo['filename']] = unserialize(file_get_contents($this->getCacheRoot() . DIRECTORY_SEPARATOR . $file));
            }
        }
        
        return $items;
    }

    private function getCachePath($id)
    {
        return sprintf("%s/%s.data", $this->getCacheRoot(), $id);
    }
    
    private function getCacheRoot()
    {
        return __DIR__ . '/caches';
    }
}

$tree = new Tree();

/*
$tree->addItemWithCache(new Item(1, 0, 'level 1 id 1'));
$tree->addItemWithCache(new Item(2, 0, 'level 1 id 2'));
$tree->addItemWithCache(new Item(3, 0, 'level 1 id 3'));

$tree->addItemWithCache(new Item(11, 1, 'level 2 id 11 pid 1'));
$tree->addItemWithCache(new Item(12, 1, 'level 2 id 12 pid 1'));
$tree->addItemWithCache(new Item(13, 1, 'level 2 id 13 pid 1'));

$tree->addItemWithCache(new Item(21, 2, 'level 2 id 21 pid 2'));
$tree->addItemWithCache(new Item(22, 2, 'level 2 id 22 pid 2'));
$tree->addItemWithCache(new Item(23, 2, 'level 2 id 23 pid 2'));

$tree->addItemWithCache(new Item(31, 3, 'level 2 id 31 pid 3'));
$tree->addItemWithCache(new Item(32, 3, 'level 2 id 32 pid 3'));
$tree->addItemWithCache(new Item(33, 3, 'level 2 id 33 pid 3'));

$tree->addItemWithCache(new Item(111, 11, 'level 3 id 111 pid 11'));
$tree->addItemWithCache(new Item(112, 11, 'level 3 id 112 pid 11'));
$tree->addItemWithCache(new Item(113, 11, 'level 3 id 113 pid 11'));

echo "<pre>";

var_dump($tree->getTree());
 */

echo "<pre>";

var_dump($tree->getTreeWithCache());
