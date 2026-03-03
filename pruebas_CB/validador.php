<?php

declare(strict_types=1);

/**
 * Returnerer en fejltekst ved invalid login-input.
 * Returnerer tom streng hvis input er gyldigt.
 */
function validarLoginInput(string $username, string $password): string
{
    if ($username === '' || $password === '') {
        return 'Rellena todos los campos.';
    }

    return '';
}
