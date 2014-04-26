<?php

  require_once 'ArrayList.php';

  class ArrayListTest extends PHPUnit_Framework_TestCase {

    public function testArrayListProperties() {
      $list = new ArrayList();
      $this->assertEquals(array(), $list->elements());
      $this->assertEquals(0, $list->size());
      $this->assertEquals('[]', $list);

      $list = new ArrayList(1);
      $this->assertEquals(array(1), $list->elements());
      $this->assertEquals(1, $list->size());
      $this->assertEquals('[1]', $list);

      $list = new ArrayList(array(1, 2, 3));
      $this->assertEquals(array(1, 2, 3), $list->elements());
      $this->assertEquals(3, $list->size());
      $this->assertEquals('[1, 2, 3]', $list);
    }

    public function testInsertFirst() {
      $list = new ArrayList();

      $this->assertFalse($list->insertFirst());
      $this->assertEquals(array(), $list->elements());

      $this->assertTrue($list->insertFirst(1));
      $this->assertEquals(array(1), $list->elements());

      $this->assertTrue($list->insertFirst(array(2, 3)));
      $this->assertEquals(array(3, 2, 1), $list->elements());
    }

    public function testInsertLast() {
      $list = new ArrayList();

      $this->assertFalse($list->insertLast());
      $this->assertEquals(array(), $list->elements());

      $this->assertTrue($list->insertLast(1));
      $this->assertEquals(array(1), $list->elements());

      $this->assertTrue($list->insertLast(array(2, 3)));
      $this->assertEquals(array(1, 2, 3), $list->elements());
    }

    public function testInsertAt() {
      $list = new ArrayList();

      $this->assertFalse($list->insertAt());
      $this->assertEquals(array(), $list->elements());

      $this->assertFalse($list->insertAt(0));
      $this->assertEquals(array(), $list->elements());

      $this->assertFalse($list->insertAt(-1, 1));
      $this->assertEquals(array(), $list->elements());

      $this->assertFalse($list->insertAt(1, 1));
      $this->assertEquals(array(), $list->elements());

      $this->assertTrue($list->insertAt(0, 1));
      $this->assertEquals(array(1), $list->elements());

      $this->assertTrue($list->insertAt(0, 2));
      $this->assertEquals(array(2, 1), $list->elements());

      $this->assertTrue($list->insertAt(2, 3));
      $this->assertEquals(array(2, 1, 3), $list->elements());

      $this->assertTrue($list->insertAt(2, 4));
      $this->assertEquals(array(2, 1, 4, 3), $list->elements());
    }

    public function testRemoveFirst() {
      $list = new ArrayList(array(1, 2, 3, 4, 5));

      $elements = $list->removeFirst();
      $this->assertEquals(1, $elements);
      $this->assertEquals(array(2, 3, 4, 5), $list->elements());

      $elements = $list->removeFirst(3);
      $this->assertEquals(array(2, 3, 4), $elements);
      $this->assertEquals(array(5), $list->elements());

      $elements = $list->removeFirst(3);
      $this->assertEquals(5, $elements);
      $this->assertEquals(array(), $list->elements());

      $elements = $list->removeFirst();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $list->elements());
    }

    public function testRemoveLast() {
      $list = new ArrayList(array(1, 2, 3, 4, 5));

      $elements = $list->removeLast();
      $this->assertEquals(5, $elements);
      $this->assertEquals(array(1, 2, 3, 4), $list->elements());

      $elements = $list->removeLast(3);
      $this->assertEquals(array(4, 3, 2), $elements);
      $this->assertEquals(array(1), $list->elements());

      $elements = $list->removeLast(3);
      $this->assertEquals(1, $elements);
      $this->assertEquals(array(), $list->elements());

      $elements = $list->removeLast();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $list->elements());
    }

    public function testRemoveAt() {
      $list = new ArrayList(array(1, 2, 3, 4, 5));

      $element = $list->removeAt();
      $this->assertEquals(null, $element);
      $this->assertEquals(array(1, 2, 3, 4, 5), $list->elements());

      $element = $list->removeAt(-1);
      $this->assertEquals(null, $element);
      $this->assertEquals(array(1, 2, 3, 4, 5), $list->elements());

      $element = $list->removeAt(5);
      $this->assertEquals(null, $element);
      $this->assertEquals(array(1, 2, 3, 4, 5), $list->elements());

      $element = $list->removeAt(0);
      $this->assertEquals(1, $element);
      $this->assertEquals(array(2, 3, 4, 5), $list->elements());

      $element = $list->removeAt(3);
      $this->assertEquals(5, $element);
      $this->assertEquals(array(2, 3, 4), $list->elements());

      $element = $list->removeAt(1);
      $this->assertEquals(3, $element);
      $this->assertEquals(array(2, 4), $list->elements());
    }

    public function testGetFirst() {
      $list = new ArrayList(array(1, 2, 3));

      $elements = $list->getFirst();
      $this->assertEquals(1, $elements);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $elements = $list->getFirst(2);
      $this->assertEquals(array(1, 2), $elements);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $elements = $list->getFirst(4);
      $this->assertEquals(array(1, 2, 3), $elements);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $list = new ArrayList();
      $elements = $list->getFirst();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $list->elements());
    }

    public function testGetLast() {
      $list = new ArrayList(array(1, 2, 3));

      $elements = $list->getLast();
      $this->assertEquals(3, $elements);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $elements = $list->getLast(2);
      $this->assertEquals(array(3, 2), $elements);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $elements = $list->getLast(4);
      $this->assertEquals(array(3, 2, 1), $elements);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $list = new ArrayList();
      $elements = $list->getLast();
      $this->assertEquals(null, $elements);
      $this->assertEquals(array(), $list->elements());
    }

    public function testGetAt() {
      $list = new ArrayList(array(1, 2, 3));

      $element = $list->getAt();
      $this->assertEquals(null, $element);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $element = $list->getAt(-1);
      $this->assertEquals(null, $element);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $element = $list->getAt(3);
      $this->assertEquals(null, $element);
      $this->assertEquals(array(1, 2, 3), $list->elements());

      $element = $list->getAt(1);
      $this->assertEquals(2, $element);
      $this->assertEquals(array(1, 2, 3), $list->elements());
    }

  }

// end of file ArrayListTest.php