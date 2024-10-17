<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/TournamentController.php
class TournamentController extends Controller {
    public function createTournament(Request $request) {
        $tournament = Tournament::create(['name' => $request->name]);
        return redirect()->route('tournament.show', $tournament->id);
    }
    
    public function showTournament(Tournament $tournament) {
        $leaderboard = $tournament->games()->with('scores.player')->get()->map(function($game) {
            return $game->scores->groupBy('player_id')->map(function($scores, $player_id) {
                return [
                    'player' => Player::find($player_id)->name,
                    'total_score' => $scores->sum('points')
                ];
            });
        });
        
        return view('tournament.show', compact('tournament', 'leaderboard'));
    }
}
