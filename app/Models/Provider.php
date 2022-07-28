<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];

    public static function getIdFromName($name)
    {
        $provider = Provider::where('name', $name)->first();
        if (!$provider) {
            $provider = Provider::create(['name' => $name]);
        }
        return $provider->id;
    }
}
