<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achats extends Model
{
    use HasFactory;
    protected $table = 'achats';
    public $timestamps = false;
    protected $fillable = ['jeu_id', 'user_id', 'lieu','prix','date_achat'];

    function jeu() {
        return $this->belongsTo(Jeu::class);
    }
    function user() {
        return $this->belongsTo(User::class);
    }
}
