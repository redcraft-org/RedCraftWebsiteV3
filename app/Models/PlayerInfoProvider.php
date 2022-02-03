<?php

namespace App\Models;

use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerInfoProvider extends Model
{
    use HasFactory;


    protected $fillable = ['provider_id', 'provider_uuid', 'last_username', 'previous_username'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

}
