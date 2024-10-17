<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::post('/tournament', [TournamentController::class, 'createTournament'])->name('tournament.create');
Route::get('/tournament/{tournament}', [TournamentController::class, 'showTournament'])->name('tournament.show');
Route::post('/game/{game}/score', [ScoreController::class, 'addScore'])->name('score.add');
