<?php

declare(strict_types=1);

require __DIR__ . '/validador.php';

assert(validarLoginInput('', '') === 'Rellena todos los campos.');
assert(validarLoginInput('pepe', '') === 'Rellena todos los campos.');
assert(validarLoginInput('', '1234') === 'Rellena todos los campos.');
assert(validarLoginInput('pepe', '1234') === '');

echo "OK: test_validador\n";
