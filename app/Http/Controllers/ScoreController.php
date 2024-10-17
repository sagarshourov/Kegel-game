<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/ScoreController.php
class ScoreController extends Controller {
    public function addScore(Request $request, Game $game) {
        $score = new Score([
            'player_id' => $request->player_id,
            'points' => $request->points
        ]);
        $game->scores()->save($score);
        
        return redirect()->route('tournament.show', $game->tournament_id);
    }
}
