<?php

  class Queue {

    private $queue;

    public function __construct($elements = null) {
      $this->queue = $this->normalized_array($elements);
    }

    public function enqueue($elements = null) {
      $elements = $this->normalized_array($elements);
      if (!empty($elements)) {
        foreach ($elements as $element) {
          $this->queue[] = $element;
        }
        return true;
      }
      return false;
    }

    public function dequeue($count = 1) {
      $elements = array();
      for ($i = 0; $i < $count && !empty($this->queue); $i++) {
        $elements[] = array_shift($this->queue);
      }
      return $this->normalized_element($elements);
    }

    public function first($count = 1) {
      $elements = array();
      for ($i = 0; $i < $count && $i < $this->size(); $i++) {
        $elements[] = $this->queue[$i];
      }
      return $this->normalized_element($elements);
    }

    public function last($count = 1) {
      $elements = array();
      for ($i = 1; $i <= $count && $i <= $this->size(); $i++) {
        $elements[] = $this->queue[$this->size() - $i];
      }
      return $this->normalized_element($elements);
    }

    public function elements() {
      return $this->queue;
    }

    public function size() {
      return count($this->queue);
    }

    private function normalized_array($elements = null) {
      if ($elements === null) {
        return array();
      } else if (!is_array($elements)) {
        return array($elements);
      }
      return $elements;
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
      return '[' . join(', ', $this->queue) . ']';
    }

  }

// end of file Queue.php