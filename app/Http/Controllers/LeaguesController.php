<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeaguesController extends Controller
{
    public function getLeaguesIds(Request $request): array
    {
        if ($request->has('start_timestamp')) {
            $startTimestamp = $request->get('start_timestamp');

            return League::query()
                ->where('start_timestamp','>=', $startTimestamp)
                ->get()
                ->toArray();
        }

        return League::query()->pluck('league_id')->toArray();
    }

    public function getLeagueById(int $id): string
    {
        $name = League::query()
                    ->where('league_id', $id)
                    ->first('name')['name'];

        if (!$name) {
            return "We cannot find league with id $id. Please try another id.";
        }

        return $name;
    }

    public function saveLeaguesFromApi(): string
    {
        $leagues = Http::get('https://www.dota2.com/webapi/IDOTA2League/GetLeagueInfoList/v001')['infos'];

        foreach ($leagues as $league) {
            League::query()->create($league);
        }

        return 'Successfully updated';
    }
}
