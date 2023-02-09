<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Actor::orderBy('id', 'desc')->get();

        return view('admin.actor.index')
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
        return view('admin.actor.create');
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

        $obj = Actor::create([
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            $name = str()->random(10) . '.' . $request->image->extension();
            Storage::putFileAs('public/a', $request->image, $name);
            $obj->image = $name;
            $obj->update();
        }

        return to_route('admin.actors.index')
            ->with([
                'success' => trans('app.actor') . ' (' . $obj->name . ') ' . trans('app.added') . '!'
            ]);
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
        $obj = Actor::findOrFail($id);

        return view('admin.actor.edit')
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

        $obj = Actor::updateOrCreate([
            'id' => $id,
        ], [
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            if ($obj->image) {
                Storage::delete('public/a/' . $obj->image);
            }
            $name = str()->random(10) . '.' . $request->image->extension();
            Storage::putFileAs('public/a', $request->image, $name);
            $obj->image = $name;
            $obj->update();
        }

        return to_route('admin.actors.index')
            ->with([
                'success' => trans('app.actor') . ' (' . $obj->name . ') ' . trans('app.updated') . '!'
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
        $obj = Actor::findOrFail($id);
        $objName = $obj->name;
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.actor') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }
}
