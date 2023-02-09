<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
            'has_favorites' => 'nullable|boolean',
        ]);
        $q = $request->q ?: null;
        $f_hasFavorites = $request->has('has_favorites') ? $request->has_favorites : null;

        $objs = Customer::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->orWhere('name', 'like', '%' . $q . '%');
                $query->orWhere('username', 'like', '%' . $q . '%');
            });
        })
            ->when(isset($f_hasFavorites), function ($query) use ($f_hasFavorites) {
                if ($f_hasFavorites) {
                    return $query->has('favorites');
                } else {
                    return $query->doesntHave('favorites');
                }
            })
            ->orderBy('id', 'desc')
            ->withCount('favorites')
            ->paginate(50)
            ->withQueryString();

        return view('admin.customer.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function edit($id)
    {
        $obj = Customer::findOrFail($id);

        return view('admin.customer.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
        ]);

        $obj = Customer::updateOrCreate([
            'id' => $id,
        ], [
            'name' => $request->name,
            'username' => $request->username,
        ]);


        return to_route('admin.customers.index')
            ->with([
                'success' => trans('app.customer') . ' (' . $obj->name . ') ' . trans('app.updated') . '!'
            ]);
    }


    public function destroy($id)
    {
        $obj = Customer::findOrFail($id);
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.customer') . ' (' . $obj->name . ') ' . trans('app.deleted') . '!'
            ]);
    }
}
