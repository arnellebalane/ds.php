<?php

  require_once 'Queue.php';

  class QueueTest extends PHPUnit_Framework_TestCase {

    public function test_queue_properties() {
      $queue = new Queue();
      $this->assertEquals(array(), $queue->elements());
      $this->assertEquals(0, $queue->size());
      $this->assertEquals('[]', $queue);

      $queue = new Queue(1);
      $this->assertEquals(array(1), $queue->elements());
      $this->assertEquals(1, $queue->size());
      $this->assertEquals('[1]', $queue);

      $queue = new Queue(array(1, 2, 3));
      $this->assertEquals(array(1, 2, 3), $queue->elements());
      $this->assertEquals(3, $queue->size());
      $this->assertEquals('[1, 2, 3]', $queue);
    }

    public function test_enqueue() {
      $queue = new Queue();

      $queue->enqueue();
      $this->assertEquals(array(), $queue->elements());

      $queue->enqueue(1);
      $this->assertEquals(array(1), $queue->elements());

      $queue->enqueue(array(2, 3));
      $this->assertEquals(array(1, 2, 3), $queue->elements());
    }

    public function test_dequeue() {
      $queue = new Queue(array(1, 2, 3, 4, 5));

      $elements = $queue->dequeue();
      $this->assertEquals(1, $elements);
      $this->assertEquals(array(2, 3, 4, 5), $queue->elements());

      $elements = $queue->dequeue(3);
      $this->assertEquals(array(2, 3, 4), $elements);
      $this->assertEquals(array(5), $queue->elements());

      $elements = $queue->dequeue(3);
      $this->assertEquals(5, $elements);
      $this->assertEquals(array(), $queue->elements());

      $elements = $queue->dequeue();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $queue->elements());
    }

    public function test_first() {
      $queue = new Queue(array(1, 2, 3));

      $elements = $queue->first();
      $this->assertEquals(1, $elements);
      $this->assertEquals(array(1, 2, 3), $queue->elements());

      $elements = $queue->first(2);
      $this->assertEquals(array(1, 2), $elements);
      $this->assertEquals(array(1, 2, 3), $queue->elements());

      $elements = $queue->first(5);
      $this->assertEquals(array(1, 2, 3), $elements);
      $this->assertEquals(array(1, 2, 3), $queue->elements());

      $queue = new Queue();
      $elements = $queue->first();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $queue->elements());
    }

    public function test_last() {
      $queue = new Queue(array(1, 2, 3));

      $elements = $queue->last();
      $this->assertEquals(3, $elements);
      $this->assertEquals(array(1, 2, 3), $queue->elements());

      $elements = $queue->last(2);
      $this->assertEquals(array(3, 2), $elements);
      $this->assertEquals(array(1, 2, 3), $queue->elements());

      $elements = $queue->last(5);
      $this->assertEquals(array(3, 2, 1), $elements);
      $this->assertEquals(array(1, 2, 3), $queue->elements());

      $queue = new Queue();
      $elements = $queue->last();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $queue->elements());
    }

  }  

// end of file QueueTest.php