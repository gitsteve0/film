<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
            'c' => 'nullable|array',
            'c.*' => 'nullable|integer|min:0|distinct',
            'v' => 'nullable|array',
            'v.*' => 'nullable|array',
            'v.*.*' => 'nullable|integer|min:0|distinct',
        ]);

        $q = $request->q ?: null;
        $f_categories = $request->has('c') ? $request->c : [];
        $f_values = $request->has('v') ? $request->v : [];

        $seasons = Season::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->orWhere('name', 'like', '%' . $q . '%');
            });
        })

            ->when($f_categories, function ($query, $f_categories) {
                $query->whereIn('category_id', $f_categories);
            })
            ->when($f_values, function ($query, $f_values) {
                return $query->where(function ($query) use ($f_values) {
                    foreach ($f_values as $f_value) {
                        $query->whereHas('attributeValues', function ($query) use ($f_value) {
                            $query->whereIn('id', $f_value);
                        });
                    }
                });
            })
            ->with('language', 'age')
            ->withCount('episodes')
            ->orderBy('id', 'desc')
            ->paginate(48);

        $seasons = $seasons->appends([
            'q' => $q,
            'c' => $f_categories,
            'v' => $f_values,
        ]);

        $categories = Category::orderBy('sort_order')
            ->orderBy('slug')
            ->get();
        $attributes = Attribute::with('values')
            ->orderBy('sort_order')
            ->get();


        return view('admin.season.index')
            ->with([
                'q' => $q,
                'f_categories' => collect($f_categories),
                'f_values' => collect($f_values)->collapse(),
                'seasons' => $seasons,
                'categories' => $categories,
                'attributes' => $attributes,
            ]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
