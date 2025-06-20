<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
/** 
 * @var array
*/

protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,               // Enkripsi cookie
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Tambahkan cookie ke response
        \Illuminate\Session\Middleware\StartSession::class,       // Mulai session
        // \Illuminate\Session\Middleware\AuthenticateSession::class, // Otentikasi session (opsional)
        \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Bagikan error dari session ke view
        \App\Http\Middleware\VerifyCsrfToken::class,              // Cegah CSRF
        \Illuminate\Routing\Middleware\SubstituteBindings::class,  // Bind route model
        \App\Http\Middleware\HandleInertiaRequests::class,        // Middleware Inertia.js (jika pakai)
    ],

    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Untuk SPA dengan Sanctum
        'throttle:api',                                             // Batasi rate request API
        \Illuminate\Routing\Middleware\SubstituteBindings::class,  // Bind route model
    ],

    // Contoh group middleware kustom
    'admin' => [
        'auth',                 // Middleware auth (harus login)
        'role:admin',           // Middleware role kustom (harus admin)
        \App\Http\Middleware\LogRequest::class, // Middleware logging request kustom
    ],
];
