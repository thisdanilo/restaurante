<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /** Tela inicial */
    public function __invoke(): View
    {
        if (auth()->user()->role->id == 1) {
            $restaurants = Tenant::count();

            $categories = Category::count();
        } else {

            $restaurants = Tenant::where('user_id', auth()->user()->id)->count();

            $categories = Category::where('user_id', auth()->user()->id)->count();
        }

        return view('admin.dashboard.index', compact('restaurants', 'categories'));
    }
}
