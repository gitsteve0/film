<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

    public function category($slug){
        $category = Category::where('slug', $slug)
            ->firstOrFail();
        $seasons = Season::where('category_id', $category->id)
            ->orderBy('id', 'desc')
            ->paginate(42);

        return view('client.category.show')
            ->with([
                'category' => $category,
                'seasons' => $seasons,
            ]);
    }

    public function episode(){
        //
    }

}
