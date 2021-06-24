<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.team.index');
    }

    public function teamsDeleted()
    {
        return view('admin.team.deleteIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create', [
            'team' => Team::get(),
            'cities' => City::get(),
        ]);
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
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'tahun' => 'required',
            'alamat' => 'required',
            'city' => 'required',
        ]);

        $nameTeam = Str::slug($request->name);
        $logo = request()->file('logo');
        $logoUrl = $logo->storeAs("images/team", "{$nameTeam}.{$logo->extension()}");

        Team::create([
            'name' => $request->name,
            'logo_url' => $logoUrl,
            'tahun_berdiri' => $request->tahun,
            'alamat_team' => $request->alamat,
            'city_id' => $request->city,
        ]);

        return redirect()->to('/admin/team')->with('success', 'team berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', [
            'team' => $team,
            'cities' => City::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Team $team)
    {
        request()->validate([
            'name' => 'required|min:3',
            'logo' => 'image|mimes:jpeg,jpg,png|max:2048',
            'tahun' => 'required',
            'alamat' => 'required',
            'city' => 'required',
        ]);

        if (request()->file('logo')) {
            Storage::delete($team->logo_url);
            $nameTeam = Str::slug(request()->name);
            $logo = request()->file('logo');
            $logoUrl = $logo->storeAs("images/team", "{$nameTeam}.{$logo->extension()}");
        } else {
            $logoUrl = $team->logo_url;
        }

        $team->update([
            'name' => request()->name,
            'logo_url' => $logoUrl,
            'tahun_berdiri' => request()->tahun,
            'alamat_team' => request()->alamat,
            'city_id' => request()->city,
        ]);

        return redirect()->to('/admin/team')->with('success', 'Team berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->to('/admin/team')->with('success', 'data berhasil di hapus');
    }

    public function restore($id)
    {
        $team = Team::onlyTrashed()->where('id', $id);
        $team->restore();
        return redirect()->to('/admin/team')->with('success', 'data berhasil direstore');
    }

    public function force($id)
    {
        $team = Team::onlyTrashed()->where('id', $id);
        $team->forceDelete();
        return redirect()->to('/admin/team')->with('success', 'data berhasil dihapus permanen');
    }
}
