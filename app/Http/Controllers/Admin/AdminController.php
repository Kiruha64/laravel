<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Psy\debug;

class AdminController extends Controller
{
    public function admin()
    {
//        $route = request()->route();
//        return [
//            'getController'   => get_class($route->getController()),
//            'getName'         => $route->getName(),
//            'getActionName'   => $route->getActionName(),
//            'getActionMethod' => $route->getActionMethod(),
//        ];
//        $action_name = $route->getActionMethod();
        return view('admin.index');

    }
}
