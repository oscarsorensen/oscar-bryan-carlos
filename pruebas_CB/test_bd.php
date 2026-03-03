<?php

declare(strict_types=1);

require __DIR__ . '/bd.php';

assert(isset($conexion));
assert($conexion instanceof mysqli);

echo "OK: test_bd\n";
