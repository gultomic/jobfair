<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Config extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = ['identity','body'];
    protected $primaryKey = null;
    protected $casts = [
        'body' => AsCollection::class,
    ];

    public $incrementing = false;
    public $timestamps = false;
}
