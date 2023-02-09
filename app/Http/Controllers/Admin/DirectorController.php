<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Director::orderBy('id', 'desc')->get();

        return view('admin.director.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.director.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:png', 'max:16', 'dimensions:width=200,height=200'],
        ]);

        $obj = director::create([
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            $name = str()->random(10) . '.' . $request->image->extension();
            Storage::putFileAs('public/d', $request->image, $name);
            $obj->image = $name;
            $obj->update();
        }

        return to_route('admin.directors.index')
            ->with([
                'success' => trans('app.director') . ' (' . $obj->name . ') ' . trans('app.added') . '!'
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Director::findOrFail($id);

        return view('admin.director.edit')
            ->with([
                'obj' => $obj,
            ]);
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:png', 'max:16', 'dimensions:width=200,height=200'],
        ]);

        $obj = Director::updateOrCreate([
            'id' => $id,
        ], [
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            if ($obj->image) {
                Storage::delete('public/d/' . $obj->image);
            }
            $name = str()->random(10) . '.' . $request->image->extension();
            Storage::putFileAs('public/d', $request->image, $name);
            $obj->image = $name;
            $obj->update();
        }

        return to_route('admin.directors.index')
            ->with([
                'success' => trans('app.director') . ' (' . $obj->name . ') ' . trans('app.updated') . '!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Director::findOrFail($id);
        $objName = $obj->name;
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.director') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }
}
