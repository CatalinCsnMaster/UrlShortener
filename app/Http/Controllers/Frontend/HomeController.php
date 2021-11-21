<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return redirect('/dashboard');
    }
}
