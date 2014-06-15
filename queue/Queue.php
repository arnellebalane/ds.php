<?php

  class Queue {

    private $queue;

    public function __construct($elements = null) {
      $this->queue = $this->normalized_array($elements);
    }

    public function enqueue($elements = null) {
      $elements = $this->normalized_array($elements);
      $this->queue = array_merge($this->queue, $elements);
    }

    public function dequeue($count = 1) {
      if (is_int($count)) {
        $elements = array();
        for ($i = 0; $i < $count && !empty($this->queue); $i++) {
          $elements[] = array_shift($this->queue);
        }
        return $this->normalized_element($elements);
      }
      throw new Exception('count must be an integer');
    }

    public function first($count = 1) {
      if (is_int($count)) {
        $elements = array_slice($this->queue, 0, $count);
        return $this->normalized_element($elements);
      }
      throw new Exception('count must be an integer');
    }

    public function last($count = 1) {
      if (is_int($count)) {
        $elements = array_reverse($this->queue);
        $elements = array_slice($elements, 0, $count);
        return $this->normalized_element($elements);
      }
      throw new Exception('count must be an integer');
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