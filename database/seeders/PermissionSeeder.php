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

        $routes = collect(Route::getRoutes())->map(function ($route) {
            return [
                'name' => $route->getName(). $route->uri(),
                'url' => $route->uri(),
            ];
        })->unique('name');

            Permission::insert($routes->toArray());
    }
}
