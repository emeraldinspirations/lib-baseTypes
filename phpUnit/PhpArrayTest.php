<?php

namespace emeraldinspirations\library\baseTypes;

/**
 * @author Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 */
class ControllerCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function dataXor() {
        return [
            [
                ['Foo', 'FooBar', 'Bar'],
                ['foo', 'Bar', 'bar'],
                ['Foo', 'FooBar', 'foo', 'bar']
            ]
        ];
    }

     /**
     * @covers emeraldinspirations\library\baseTypes\PhpArray::xor
     * @dataProvider dataXor
     */
    public function testXor($Array1, $Array2, $Array_Expected) {
        $this->assertEquals(
            $Array_Expected,
            PhpArray::xor($Array1, $Array2)
        );
    }
}
