<?php

static function array_xor($pArray1, $pArray2) {
  return array_merge(
          array_diff($pArray1, $pArray2),
          array_diff($pArray2, $pArray1)
  );
}