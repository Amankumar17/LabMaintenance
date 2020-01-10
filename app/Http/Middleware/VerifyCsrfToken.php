<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/feedback',
        '/teacher',
        '/admin_home',
        '/hod_home',
        '/principal_home',
        '/datasubmitted',

        '/teacher_confirm',
        '/datasubmitted_fac',

        '/system_demo1',
        '/system_demo2',
        '/admin_demo1',
        '/admin_demo2',
        '/faculty_demo1',
        '/faculty_demo2',
        '/admin_confirm',
        '/admin_done',

        '/chart',
        '/report',

        '/transfer_pc',
        '/searchLab',
        '/hodsearchLab',
        '/principalsearchLab',
        '/admin_demo3',
        '/admin_demo4'
    ];
}
