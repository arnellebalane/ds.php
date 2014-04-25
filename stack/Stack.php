<?php

  class Stack {

    private $stack;

    public function __construct($elements = array()) {
      $this->stack = $this->normalized_array($elements);
    }

    public function push($elements = array()) {
      $elements = $this->normalized_array($elements);
      foreach ($elements as $element) {
        $this->stack[] = $element;
      }
    }

    public function pop($count = 1) {
      $elements = array();
      while ($count-- > 0 && !empty($this->stack)) {
        $elements[] = array_pop($this->stack);
      }
      return $this->normalized_element($elements);
    }

    public function top($count = 1) {
      $elements = array();
      for ($i = 1; $i <= $count && $i < count($this->stack); $i++) {
        $elements[] = $this->stack[count($this->stack) - $i];
      }
      return $this->normalized_element($elements);
    }

    public function elements() {
      return $this->stack;
    }

    public function size() {
      return count($this->stack);
    }

    private function normalized_array($elements = array()) {
      if ($elements === null) {
        return array();
      } else if (is_array($elements)) {
        return $elements;
      }
      return array($elements);
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
      return '[' . join(', ', $this->stack) . ']';
    }

  }

// end of file Stack.php