<?php

  require_once 'Stack.php';

  class StackTest extends PHPUnit_Framework_TestCase {

    public function test_stack_properties() {
      $stack = new Stack();
      $this->assertEquals(array(), $stack->elements());
      $this->assertEquals(0, $stack->size());
      $this->assertEquals('[]', $stack);

      $stack = new Stack(1);
      $this->assertEquals(array(1), $stack->elements());
      $this->assertEquals(1, $stack->size());
      $this->assertEquals('[1]', $stack);

      $stack = new Stack(array(1, 2, 3));
      $this->assertEquals(array(1, 2, 3), $stack->elements());
      $this->assertEquals(3, $stack->size());
      $this->assertEquals('[1, 2, 3]', $stack);
    }

    public function test_push() {
      $stack = new Stack();

      $stack->push();
      $this->assertEquals(array(), $stack->elements());

      $stack->push(1);
      $this->assertEquals(array(1), $stack->elements());

      $stack->push(array(2, 3));
      $this->assertEquals(array(1, 2, 3), $stack->elements());
    }

    public function test_pop() {
      $stack = new Stack(array(1, 2, 3, 4, 5));

      $elements = $stack->pop();
      $this->assertEquals(5, $elements);
      $this->assertEquals(array(1, 2, 3, 4), $stack->elements());

      $elements = $stack->pop(3);
      $this->assertEquals(array(4, 3, 2), $elements);
      $this->assertEquals(array(1), $stack->elements());

      $elements = $stack->pop(3);
      $this->assertEquals(1, $elements);
      $this->assertEquals(array(), $stack->elements());

      $elements = $stack->pop();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $stack->elements());
    }

    public function test_top() {
      $stack = new Stack(array(1, 2, 3));

      $elements = $stack->top();
      $this->assertEquals(3, $elements);
      $this->assertEquals(array(1, 2, 3), $stack->elements());

      $elements = $stack->top(2);
      $this->assertEquals(array(3, 2), $elements);
      $this->assertEquals(array(1, 2, 3), $stack->elements());

      $elements = $stack->top(5);
      $this->assertEquals(array(3, 2, 1), $elements);
      $this->assertEquals(array(1, 2, 3), $stack->elements());

      $stack = new Stack();
      $elements = $stack->top();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $stack->elements());
    }

  }

// end of file StackTest.php