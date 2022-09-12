<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // 'http://127.0.0.1:8000/restaurantes/create',
        // 'http://127.0.0.1:8000/api/horarios/{id}',
        // 'http://127.0.0.1:8000/api/categoria-restaurantes',
        // 'http://127.0.0.1:8000/api/horarios',
        // 'http://127.0.0.1:8000/api/restaurantes',
        // 'http://127.0.0.1:8000/api/mesas',
        // 'http://127.0.0.1:8000/api/mesas/destroy/*',
        // "http://127.0.0.1:8000/mesas/{id}"

        '/restaurantes/create',
        '/api/horarios/{id}',
        '/api/categoria-restaurantes',
        '/api/horarios',
        '/api/restaurantes',
        '/api/mesas',
        '/api/mesas/destroy/*',
        '/api/mesas/inativar/*',
        '/api/mesas/reativar/*',
        '/api/mesas/atualizar/*',
        '/api/pratos/especiais/*',
        '/api/pratos/*',
        '/api/restaurantes/premium/cancelar/*',
        '/api/mesas/reserva',
        '/api/slides/*',
        '/api/reservas/*',
        '/api/reservas/checkin/*',
        '/api/reservas/checkout/*',
        '/api/reservas/cancelar/*',
        '/api/categorias/restaurantes',
        '/api/categoria-restaurantes/*',
        "/mesas/{id}",

    ];
}
