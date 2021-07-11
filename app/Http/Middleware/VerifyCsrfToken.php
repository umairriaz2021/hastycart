<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'dashboard/settings/update-password',
        'dashboard/settings/check-password',
        'dashboard/sec-active-inactive',
        'dashboard/cat-active-inactive',
        'dashboard/append-categories',
        'dashboard/prod-active-inactive',
        'dashboard/products/attribute-status',
        'dashboard/products/attribute-delete',
        'dashboard/products/product-images-status',
        'dashboard/products/product-image-delete',
        'dashboard/brands/brand-status',
        'dashboard/brands/delete-image'
    ];
}
