<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $routes = collect(Route::getRoutes())
        ->filter(function($route){
            return $route->getName();
        })
        ->map(function ($route) {
            return [
                'name' => $route->getName() ,
                'url' => $route->uri(),
            ];
        })->unique('name');

            Permission::insert($routes->toArray());
    }
}
