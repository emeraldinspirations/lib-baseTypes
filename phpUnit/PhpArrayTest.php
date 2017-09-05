<?php

/**
 * Container for PhpArray generic function unit tests
 *
 * PHP Version 7
 *
 * @category  Library
 * @package   Helper-Array
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   MIT ../LICENSE.md
 * @link      https://github.com/emeraldinspirations/lib-helper-array
 */

namespace emeraldinspirations\library\helper\phpArray;

/**
 * PhpArray generic function unit tests
 *
 * @category  Library
 * @package   Helper-Array
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   MIT ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-helper-array
 */
class PhpArrayTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Verifies xor function
     *
     * @return void
     */
    public function testXor()
    {
        $Array1         = ['Foo', 'FooBar', 'Bar'];
        $Array2         = ['foo', 'Bar', 'bar'];
        $Array_Expected = ['Foo', 'FooBar', 'foo', 'bar'];

        $this->assertEquals(
            $Array_Expected,
            PhpArray::xor($Array1, $Array2),
            'Fails if xor function returns unexpected results'
        );
    }

    /**
     * Verifies array_reduce example works
     *
     * @return void
     */
    public function testWalkReduce()
    {
        $Array = ['This', 'is', 'a', 'test'];
        $Reduce = function (
            $Key,
            $Value,
            $Carry,
            &$Break,
            &...$Params
        ) {
            if ($Carry) {
                return $Carry . ' ' . $Value;
            }

            return $Value;
        };

        $this->assertEquals(
            'This is a test',
            PhpArray::walk($Array, $Reduce, ''),
            'Fails if issue with array_reduce example'
        );

    }

    /**
     * Verifies array_map example works
     *
     * @return void
     */
    public function testWalkMap()
    {
        $Array = ['One'=>1, 'Two'=>2, 'Three'=>3, 'Four'=>4];
        $Map = function (
            $Key,
            $Value,
            $Carry,
            &$Break,
            &...$Params
        ) {
            $Carry[$Value] = $Key;

            return $Carry;
        };

        $this->assertEquals(
            [1=>'One', 2=>'Two', 3=>'Three', 4=>'Four'],
            PhpArray::walk($Array, $Map, []),
            'Fails if issue with array_map example'
        );

    }

    /**
     * Verifies array_search example works
     *
     * @return void
     */
    public function testWalkSearch()
    {
        $Array = ['KS'=>'Kansas', 'KY'=>'Kentucky'];
        $Search = function (
            $Key,
            $Value,
            $Carry,
            &$Break,
            &...$Params
        ) {
            if ($Value == 'Kansas') {
                $Break = true;
                return $Key;
            }

            $this->assertFalse(
                true,
                'Fails if code ever gets here'
            );
        };

        $this->assertEquals(
            'KS',
            PhpArray::walk($Array, $Search),
            'Fails if issue with array_map example'
        );

    }

    /**
     * Verifies scaler reference example works
     *
     * @return void
     */
    public function testWalkScalerReference()
    {
        $Array = str_split('electrocardiographically');
        $ScalerReference = function (
            $Key,
            $Value,
            $Carry,
            &$Break,
            &$LetterE,
            &$LetterL
        ) {
            if ($Value == 'e') {
                $LetterE ++;
            } elseif ($Value == 'l') {
                $LetterL ++;
            }
        };

        $Es = $Ls = 0;

        PhpArray::walkByRef($Array, $ScalerReference, null, $Es, $Ls);

        $this->assertEquals(
            2,
            $Es,
            'Fails if issue with scaler reference example (E count)'
        );

        $this->assertEquals(
            3,
            $Ls,
            'Fails if issue with scaler reference example (L count)'
        );

    }

    /**
     * Verifies ArrayObject example works
     *
     * @return void
     */
    public function testWalkArrayObject()
    {
        $Array = new \ArrayObject(['test']);
        $ArrayObject = function (
            $Key,
            $Value,
            $Carry,
            &$Break
        ) {
            return $Value;
        };

        $this->assertEquals(
            'test',
            PhpArray::walk($Array, $ArrayObject, ''),
            'Fails if issue with ArrayObject example'
        );

    }

}
