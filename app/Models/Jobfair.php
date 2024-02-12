<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Jobfair extends Model
{
    use HasFactory;

    protected $table = 'jobfair';
    protected $guarded = ['id'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];

    /**
     * Get all of the events for the Jobfair
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get all of the attendaces for the Jobfair
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function attendances(): HasManyThrough
    {
        return $this->hasManyThrough(Kehadiran::class, Event::class);
    }
}
