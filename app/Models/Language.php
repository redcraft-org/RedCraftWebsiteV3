<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public static function getIdFromCode($code)
    {
        return self::where('code', $code)->first()->id;
    }

    public static function getNameFromCode($code)
    {
        return self::where('code', $code)->first()->name;
    }

    public static function getCodeFromId($id)
    {
        return self::where('id', $id)->first()->code;
    }

    public static function getNameFromId($id)
    {
        return self::where('id', $id)->first()->name;
    }

    public static function getIdFromName($name)
    {
        return self::where('name', $name)->first()->id;
    }

    public static function getCodeFromName($name)
    {
        return self::where('name', $name)->first()->code;
    }
}
