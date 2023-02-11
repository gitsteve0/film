<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\Request;
use Iman\Streamer\VideoStreamer;

class HomeController extends Controller
{
    public function index(){

        $seasons = Season::with('age', 'language')
            ->inRandomOrder()
            ->take(6)
            ->get();
        return view('client.home.index')
            ->with([
                'seasons' => $seasons
            ]);
    }

    public function language($locale)
    {
        switch ($locale) {
            case 'tm':
                session()->put('locale', 'tm');
                return redirect()->back();
                break;
            case 'en':
                session()->put('locale', 'en');
                return redirect()->back();
                break;
            case 'ru':
                session()->put('locale', 'ru');
                return redirect()->back();
                break;
            default:
                return redirect()->back();
        }
    }
}
