<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.city.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cityDeleted()
    {
        return view('admin.city.deleteIndex');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
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
            'name' => 'required|min:3',
        ]);

        City::create([
            'name' => $request->name,
        ]);


        return redirect()->to('/admin/city')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.city.edit', [
            'city' => $city,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(City $city)
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);

        $city->update([
            'name' => request()->name,
        ]);


        return redirect()->to('/admin/city')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->to('/admin/city')->with('success', 'data berhasil dihapus');
    }

    public function restore($id)
    {
        $city = City::onlyTrashed()->where('id', $id);
        $city->restore();
        return redirect()->to('/admin/city')->with('success', 'data berhasil direstore');
    }

    public function force($id)
    {
        $city = City::onlyTrashed()->where('id', $id);
        $city->forceDelete();
        return redirect()->to('/admin/city')->with('success', 'data berhasil dihapus permanen');
    }
}
