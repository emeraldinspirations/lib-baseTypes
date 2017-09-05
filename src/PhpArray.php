<?php

/**
 * Container for PhpArray generic functions
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
 * PhpArray generic functions
 *
 * @category  Library
 * @package   Helper-Array
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   MIT ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-helper-array
 */
class PhpArray
{

    /**
     * Return an array containing elements only in one of the supplied arrays
     *
     * @param array $Array1 First array
     * @param array $Array2 Second array
     *
     * @return array
     */
    static function xor(array $Array1, array $Array2)
    {
        return array_merge(
            array_diff($Array1, $Array2),
            array_diff($Array2, $Array1)
        );
    }

    /**
     * Iterate through array, run callback each iteration
     *
     * @param iterable $Array     Array to iterate
     * @param callable $Callback  Function to run each iteration
     *                            Function Parameters:
     *                            $Key, $Value, $Carry, &$Break, ...&$Params
     * @param various  $Initial   (Optional) Value $Carry is set to on first
     *                            iteration
     * @param various  ...$Params (Optional) Additional parameters to pass to
     *                            $Callback
     *
     * @todo When PHP 7.1 released, type hint $Array as iterable
     *
     * @return various Value returned on last iteration
     */
    static function walk(
        $Array,
        callable $Callback,
        $Initial = null,
        ...$Params
    ) {
        return self::walkByRef(
            $Array,
            $Callback,
            $Initial,
            ...$Params
        );
    }

    /**
     * Iterate through array object, run callback each iteration
     *
     * This function passes all optional Parameters as reference
     *
     * @param array    $Array     Array to iterate
     * @param callable $Callback  Function to run each iteration
     *                            Function Parameters:
     *                            $Key, $Value, $Carry, &$Break, ...&$Params
     * @param various  $Initial   (Optional) Value $Carry is set to on first
     *                            iteration
     * @param various  ...$Params (Optional) Additional parameters to pass to
     *                            $Callback
     *
     * @todo When PHP 7.1 released, type hint $Array as iterable
     *
     * @return various Value returned on last iteration
     */
    static function walkByRef(
        $Array,
        callable $Callback,
        $Initial = null,
        &...$Params
    ) {

        // Set default values
        $Carry = $Initial;
        $Break = false;

        // Iterate through array
        foreach ($Array as $Key => $Value) {

            // Run callback function, keep results
            $Carry = $Callback(
                $Key,
                $Value,
                $Carry,
                $Break,
                ...$Params
            );

            // If callback sets $Break true, leave iteration
            if ($Break) {
                break;
            }
        }

        // Return results
        return $Carry;

    }
}
