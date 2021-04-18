<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Admin Panel - Routes';
        $routeOutList = ['_ignition', '_debugbar', 'api', 'sanctum'];
        $routes = Route::getRoutes();
        return view('admin.route.index', compact('title', 'routes', 'routeOutList'));
    }
}
