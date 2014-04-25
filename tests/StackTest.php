<?php

  require_once '../stack/Stack.php';

  class StackTest extends PHPUnit_Framework_TestCase {

    public function testNewStackWithoutInitialElements() {
      $stack = new Stack();
      $this->assertEquals('[]', $stack);
      $this->assertEquals(array(), $stack->elements());
      $this->assertEquals(0, $stack->size());
    }

    public function testNewStackWithSingleInitialElement() {
      $stack = new Stack(1);
      $this->assertEquals('[1]', $stack);
      $this->assertEquals(array(1), $stack->elements());
      $this->assertEquals(1, $stack->size());
    }

    public function testNewStackWithArrayOfInitialElements() {
      $stack = new Stack(array(1, 2, 3));
      $this->assertEquals('[1, 2, 3]', $stack);
      $this->assertEquals(array(1, 2, 3), $stack->elements());
      $this->assertEquals(3, $stack->size());
    }

    public function testPushNothing() {
      $stack = new Stack();
      $stack->push();
      $this->assertEquals('[]', $stack);
    }

    public function testPushASingleElement() {
      $stack = new Stack();
      $stack->push(1);
      $this->assertEquals('[1]', $stack);
    }

    public function testPushAnArrayOfElements() {
      $stack = new Stack();
      $stack->push(array(1, 2, 3));
      $this->assertEquals('[1, 2, 3]', $stack);
    }

    public function testPopASingleElement() {
      $stack = new Stack(array(1, 2, 3));
      $element = $stack->pop();
      $this->assertEquals(3, $element);
      $this->assertEquals('[1, 2]', $stack);
    }

    public function testPopANumberOfElements() {
      $stack = new Stack(array(1, 2, 3));
      $elements = $stack->pop(2);
      $this->assertEquals(array(3, 2), $elements);
      $this->assertEquals('[1]', $stack);
    }

    public function testPopFromEmptyStack() {
      $stack = new Stack();
      $element = $stack->pop();
      $this->assertEquals(null, $element);
      $this->assertEquals('[]', $stack);
    }

    public function testSingleTopElementOfStack() {
      $stack = new Stack(array(1, 2, 3));
      $element = $stack->top();
      $this->assertEquals(3, $element);
      $this->assertEquals('[1, 2, 3]', $stack);
    }

    public function testSomeTopElementsOfStack() {
      $stack = new Stack(array(1, 2, 3));
      $elements = $stack->top(2);
      $this->assertEquals(array(3, 2), $elements);
      $this->assertEquals('[1, 2, 3]', $stack);
    }

    public function testTopElementOfAnEmptyStack() {
      $stack = new Stack();
      $element = $stack->top();
      $this->assertEquals(null, $element);
      $this->assertEquals('[]', $stack);
    }

    public function testStackElements() {
      $stack = new Stack(array(1, 2, 3));
      $this->assertEquals(array(1, 2, 3), $stack->elements());
    }

    public function testStackSize() {
      $stack = new Stack(array(1, 2, 3));
      $this->assertEquals(3, $stack->size());
    }

  }

// end of file StackTest.php