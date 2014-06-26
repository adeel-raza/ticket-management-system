<?php
namespace Webxity;

use Illuminate\Support\Facades\View;

class DashboardController extends \BaseController
{
    public function getIndex()
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

        $method = \Request::method();

        $requested = \Input::get('requested');

        if (empty($requested)) {
            return \Redirect::action(__CLASS__ . '@getIndex');
        }

        $requested = camel_case('@' . strtolower($method) . '_' . $requested);

        return \Redirect::action(__CLASS__ . $requested);

    }
}