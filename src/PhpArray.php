<?php

namespace emeraldinspirations\library\baseTypes;

class PhpArray {

    /**
     * @author Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
     */
    static function xor($pArray1, $pArray2) {
        return array_merge(
            array_diff($pArray1, $pArray2),
            array_diff($pArray2, $pArray1)
        );
    }

}
