<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Season;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $objs = Category::orderBy('sort_order')
            ->withCount('seasons')
            ->get();

        return view('admin.category.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->firstOrFail();
        $seasons = Season::where('category_id', $category->id)
            ->with('age', 'language')
            ->withCount('episodes')
            ->orderBy('id', 'desc')
            ->Paginate(24);

        return view('admin.category.show')
            ->with([
                'category' => $category,
                'seasons' => $seasons,
            ]);
    }



    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'name_ru' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = Category::create([
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'name_ru' => $request->name_ru ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('admin.categories.index')
            ->with([
                'success' => trans('app.category') . ' (' . $obj->getName() . ') ' . trans('app.added') . '!'
            ]);
    }


    public function edit($id)
    {
        $obj = Category::findOrFail($id);

        return view('admin.category.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'name_ru' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = Category::updateOrCreate([
            'id' => $id,
        ], [
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'name_ru' => $request->name_ru ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('admin.categories.index')
            ->with([
                'success' => trans('app.category') . ' (' . $obj->getName() . ') ' . trans('app.updated') . '!'
            ]);
    }


    public function destroy($id)
    {
        $obj = Category::withCount('seasons')
            ->findOrFail($id);
        $objName = $obj->getName();
        if ( $obj->seasons_count > 0) {
            return redirect()->back()
                ->with([
                    'error' => trans('app.error') . '!'
                ]);
        }
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.category') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }
}
