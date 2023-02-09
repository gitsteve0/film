<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Director;
use App\Models\Season;
use App\Models\SeasonEpisode;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modals = [
            ['name' => 'actors', 'total' => Actor::count()],
            ['name' => 'directors', 'total' => Director::count()],
            ['name' => 'customers', 'total' => Customer::count()],
            ['name' => 'seasons', 'total' => Season::count()],
            ['name' => 'seasonEpisodes', 'total' => SeasonEpisode::count()],
            ['name' => 'categories', 'total' => Category::count()],
            ['name' => 'attributes', 'total' => Attribute::count()],
        ];


        return view('admin.dashboard.index')
            ->with([
                'modals' => $modals,
            ]);
    }
}
