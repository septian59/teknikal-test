<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.player.index');
    }

    public function playersDeleted()
    {
        return view('admin.player.deleteIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.player.create', [
            'player' => Player::get(),
            'teams' =>  Team::get(),
            'positions' => Position::get()
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
            'team' => 'required',
            'position' => 'required',
            'berat' => 'required|numeric',
            'nomor' => ['required', Rule::unique('players')->where('team_id', $request->team)],
        ]);

        Player::create([
            'name' => $request->name,
            'team_id' => $request->team,
            'position_id' => $request->position,
            'berat_badan' => $request->berat,
            'nomor' => $request->nomor,
        ]);

        return redirect()->to('/admin/player')->with('success', 'Pemain Berhasil ditambah');
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
    public function edit(Player $player)
    {
        return view('admin.player.edit', [
            'player' => $player,
            'teams' => Team::get(),
            'positions' => Position::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {

        request()->validate([
            'name' => 'required|min:3',
            'team' => 'required',
            'position' => 'required',
            'berat' => 'required|numeric',
            'nomor' => ['required', Rule::unique('players')->where(function ($builder) use ($request) {
                return $builder->where('team_id', $request->team);
            })->ignore($request->route('player.update', $player))],
        ]);


        $player->update([
            'name' => request()->name,
            'team_id' => request()->team,
            'position_id' => request()->position,
            'berat_badan' => request()->berat,
            'nomor' => request()->nomor,
        ]);

        return redirect()->to('/admin/player')->with('success', 'Pemain berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->to('/admin/player')->with('success', 'Data masuk ke recycle');
    }

    public function restore($id)
    {
        $player = Player::onlyTrashed()->where('id', $id);
        $player->restore();

        return redirect()->to('/admin/player')->with('success', 'Data berhasil di restore');
    }

    public function force($id)
    {
        $player = Player::onlyTrashed()->where('id', $id);
        $player->forceDelete();
        return redirect()->to('/admin/player')->with('success', 'Data berhasil di hapus permanen');
    }
}
