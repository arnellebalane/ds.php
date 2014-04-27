<?php

  class ArrayList {

    private $list;

    public function __construct($elements = array()) {
      $this->list = $this->normalized_array($elements);
    }

    public function insertFirst($elements = array()) {
      $elements = $this->normalized_array($elements);
      $elements = array_reverse($elements);
      $this->list = array_merge($elements, $this->list);
    }

    public function insertLast($elements = array()) {
      $elements = $this->normalized_array($elements);
      $this->list = array_merge($this->list, $elements);
    }

    public function insertAt($index = null, $element = null) {
      if (is_int($index) && $element && $index >= 0 && $index <= $this->size()) {
        $left = array_slice($this->list, 0, $index);
        $right = array_slice($this->list, $index);
        $this->list = array_merge($left, array($element), $right);
        return true;
      }
      return false;
    }

    public function removeFirst($count = 1) {
      $elements = array();
      for ($i = 0; $i < $count && !empty($this->list); $i++) {
        $elements[] = array_shift($this->list);
      }
      return $this->normalized_element($elements);
    }

    public function removeLast($count = 1) {
      $elements = array();
      for ($i = 0; $i < $count && !empty($this->list); $i++) {
        $elements[] = array_pop($this->list);
      }
      return $this->normalized_element($elements);
    }

    public function removeAt($index = null) {
      if (is_int($index) && $index >= 0 && $index < $this->size()) {
        $element = $this->list[$index];
        $left = array_slice($this->list, 0, $index);
        $right = array_slice($this->list, $index + 1);
        $this->list = array_merge($left, $right);
        return $element;
      }
      return null;
    }

    public function getFirst($count = 1) {
      $elements = array_slice($this->list, 0, $count);
      return $this->normalized_element($elements);
    }

    public function getLast($count = 1) {
      $elements = array_reverse($this->list);
      $elements = array_slice($elements, 0, $count);
      return $this->normalized_element($elements);
    }

    public function getAt($index = null) {
      if ($index && $index >= 0 && $index < $this->size()) {
        return $this->list[$index];
      }
      return null;
    }

    public function elements() {
      return $this->list;
    }

    public function size() {
      return count($this->list);
    }

    private function normalized_array($elements = array()) {
      if ($elements === null) {
        return array();
      } else if (!is_array($elements)) {
        return array($elements);
      }
      return $elements;
    }

    private function normalized_element($elements = array()) {
      if (empty($elements)) {
        return null;
      } else if (count($elements) == 1) {
        return $elements[0];
      }
      return $elements;
    }

    public function __toString() {
      return '[' . join(', ', $this->list) . ']';
    }

  }

// end of file ArrayList.php