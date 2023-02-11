<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{

    public function season($code){

        $season = Season::where('code', $code)
            ->with('age', 'language', 'genre', 'country', 'episodes')
            ->firstOrFail();

        return view('client.season.show')
            ->with([
                'season' => $season,
            ]);
    }

    public function category(){
        //
    }

    public function episode(){
        //
    }

}
