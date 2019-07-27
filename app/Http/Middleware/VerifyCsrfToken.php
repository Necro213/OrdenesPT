<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/dologin',
        '/alta/cliente',
        '/edit/cliente/*',
        '/delete/cliente/*',
        '/alta/empleado',
        '/edit/empleado/*',
        '/delete/empleado/*',
        '/alta/orden',
        '/edit/orden/*',
        '/delete/orden/*',
        '/setorden/*',
        'cerrar/*'

    ];
}
