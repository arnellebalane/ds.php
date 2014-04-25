<?php

  class Queue {

    private $queue;

    public function __construct($elements = array()) {
      $this->queue = $this->normalized_array($elements);
    }

    public function enqueue($elements = array()) {
      $elements = $this->normalized_array($elements);
      foreach ($elements as $element) {
        $this->queue[] = $element;
      }
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
      for ($i = 0; $i < $count && $i < count($this->queue); $i++) {
        $elements[] = $this->queue[$i];
      }
      return $this->normalized_element($elements);
    }

    public function last($count = 1) {
      $elements = array();
      for ($i = 1; $i <= $count && $i <= count($this->queue); $i++) {
        $elements[] = $this->queue[count($this->queue) - $i];
      }
      return $this->normalized_element($elements);
    }

    public function elements() {
      return $this->queue;
    }

    public function size() {
      return count($this->queue);
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
      return '[' . join(', ', $this->queue) . ']';
    }

  }

// end of file Queue.php