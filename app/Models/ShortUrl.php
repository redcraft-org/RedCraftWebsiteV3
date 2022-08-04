<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'token', 'source'];
    protected $appends = ['selfUrl'];
    protected $hidden = ['id', 'source'];

    public function getSelfUrlAttribute()
    {
        $appUrl = config('app.url');
        return "{$appUrl}/r/{$this->token}";
    }

}
