<?php
namespace Webxity;

use Illuminate\Support\Facades\View;

class DashboardController extends \BaseController
{
    public function getIndex()
    {
        return View::make('dashboard');
    }

    public function getDashboard()
    {
        return View::make('dashboard');
    }

    public function getCharts()
    {
        return View::make('charts');
    }

    public function getLogin()
    {
        return View::make('login');
    }
}