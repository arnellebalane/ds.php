<?php

  class Stack {

    private $stack;

    public function __construct($elements = null) {
      $this->stack = $this->normalized_array($elements);
    }

    public function push($elements = null) {
      $elements = $this->normalized_array($elements);
      $this->stack = array_merge($this->stack, $elements);
    }

    public function pop($count = 1) {
      $elements = array();
      for ($i = 0; $i < $count && !empty($this->stack); $i++) {
        $elements[] = array_pop($this->stack);
      }
      return $this->normalized_element($elements);
    }

    public function top($count = 1) {
      $elements = array_reverse($this->stack);
      $elements = array_slice($elements, 0, $count);
      return $this->normalized_element($elements);
    }

    public function elements() {
      return $this->stack;
    }

    public function size() {
      return count($this->stack);
    }

    private function normalized_array($elements = null) {
      if ($elements === null) {
        return array();
      } else if (is_array($elements)) {
        return $elements;
      }
      return array($elements);
    }

    private function normalized_element($elements = null) {
      if (empty($elements)) {
        return null;
      } else if (count($elements) == 1) {
        return $elements[0];
      }
      return $elements;
    }

    public function __toString() {
      return '[' . join(', ', $this->stack) . ']';
    }

  }

// end of file Stack.php