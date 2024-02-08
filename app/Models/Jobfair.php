<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Jobfair extends Model
{
    use HasFactory;

    protected $table = 'jobfair';
    protected $guarded = ['id'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];
}
