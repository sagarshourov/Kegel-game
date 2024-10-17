<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Player.php
class Player extends Model {
    protected $fillable = ['name'];
    
    public function scores() {
        return $this->hasMany(Score::class);
    }
}

// app/Models/Score.php
class Score extends Model {
    protected $fillable = ['player_id', 'game_id', 'points'];
    
    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }
}

// app/Models/Game.php
class Game extends Model {
    protected $fillable = ['tournament_id'];
    
    public function tournament() {
        return $this->belongsTo(Tournament::class);
    }
    
    public function scores() {
        return $this->hasMany(Score::class);
    }
}

// app/Models/Tournament.php
class Tournament extends Model {
    protected $fillable = ['name'];
    
    public function games() {
        return $this->hasMany(Game::class);
    }
}
