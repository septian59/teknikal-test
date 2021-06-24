<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Competition;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function cities()
    {

        $cities = City::orderBy('name', 'ASC');
        return datatables()->of($cities)->addColumn('action', 'admin.city.action')->addIndexColumn()->rawColumns(['action'])->toJson();
    }

    public function citiesDeleted()
    {
        $cityDelete = City::onlyTrashed()->get();
        return datatables()->of($cityDelete)->addColumn('actionDel', 'admin.city.actionDeleted')->addIndexColumn()->rawColumns(['actionDel'])->toJson();
    }

    public function teams()
    {
        $teams = Team::orderBy('name', 'ASC');
        return datatables()->of($teams)->addColumn('action', 'admin.team.action')->addColumn('city', function (Team $model) {
            return $model->city->name;
        })->editColumn('logo_url', function (Team $model) {
            return '<img src="' . $model->getLogo() . '" height="150px">';
        })->addIndexColumn()->rawColumns(['logo_url', 'action'])->toJson();
    }

    public function teamPlayer(Team $team)
    {

        $players = $team->players()->orderBy('name', 'ASC');

        return datatables()->of($players)->addColumn('team', function ($players) {
            return $players->team->name;
        })->addColumn('posisi', function ($players) {
            return $players->position->name;
        })->addIndexColumn()->toJson();
    }

    public function teamsDeleted()
    {
        $teamDelete = Team::onlyTrashed()->get();
        return datatables()->of($teamDelete)->addColumn('actionDel', 'admin.team.actionDeleted')->addColumn('city', function (Team $model) {
            return $model->city->name;
        })->editColumn('logo_url', function (Team $model) {
            return '<img src="' . $model->getLogo() . '" height="150px">';
        })->addIndexColumn()->rawColumns(['logo_url', 'actionDel'])->toJson();
    }

    public function players()
    {
        $players = Player::orderBy('name', 'ASC');

        return datatables()->of($players)->addColumn('action', 'admin.player.action')->addColumn('team', function (Player $model) {
            return $model->team->name;
        })->addColumn('position', function (Player $model) {
            return $model->position->name;
        })->addIndexColumn()->rawColumns(['action'])->toJson();
    }

    public function playersDeleted()
    {
        $player = Player::onlyTrashed()->get();

        return datatables()->of($player)->addColumn('action', 'admin.player.actionDeleted')->addColumn('team', function (Player $model) {
            return $model->team->name;
        })->addColumn('position', function (Player $model) {
            return $model->position->name;
        })->addIndexColumn()->rawColumns(['action'])->toJson();
    }

    public function competitions()
    {
        $competitions = Competition::orderBy('tanggal_tanding', 'DESC');

        return datatables()->of($competitions)->addColumn('team_id1', function (Competition $model) {
            return $model->team1->name;
        })->addColumn('team_id2', function (Competition $model) {
            return $model->team2->name;
        })->addIndexColumn()->toJson();
    }
}
