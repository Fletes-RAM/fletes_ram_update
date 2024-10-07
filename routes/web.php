<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

/**
 * Generate a CSV of all the routes
 */
Route::get('r', function()
{
    header('Content-Type: application/excel');
    header('Content-Disposition: attachment; filename="routes.csv"');
 
    $routes = Route::getRoutes();
    $fp = fopen('php://output', 'w');
    fputcsv($fp, ['METHOD', 'URI', 'NAME', 'ACTION']);
    foreach ($routes as $route) {
        fputcsv($fp, [head($route->methods()) , $route->uri(), $route->getName(), $route->getActionName()]);
    }
    fclose($fp);
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', [IndexController::class, 'show'])->name('dashboard');
});
