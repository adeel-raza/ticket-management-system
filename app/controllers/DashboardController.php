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

    public function anyAjax()
    {
        if (!\Request::Ajax()) {
            return \App::abort(404);
        }

        $method = 'get';
        $cMethod = $method . ucwords(\Input::get('requested'));

        if (method_exists($this, $cMethod)) {
            return $this->$cMethod();
        }

        return $this->getDashboard();
    }
}