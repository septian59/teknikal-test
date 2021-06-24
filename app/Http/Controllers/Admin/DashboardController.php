<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teams = Team::count();
        $players = Player::count();

        return view('admin.home', compact('teams', 'players'));
    }
}
