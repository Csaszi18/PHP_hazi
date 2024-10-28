<?php

namespace lab4;

class ArrayManipulator
{
    private $data = [];

    public function __construct(array $initialData = []) {
        $this->data = $initialData;
    }

    public function __get($key) {
        return $this->data[$key] ?? null;
    }

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __isset($key) {
        return isset($this->data[$key]);
    }

    public function __unset($key) {
        unset($this->data[$key]);
    }

    public function __toString() {
        return implode(", ", $this->data);
    }

    public function __clone() {
        $this->data = array_map(function($item) {
            return is_object($item) ? clone $item : $item;
        }, $this->data);
    }


}