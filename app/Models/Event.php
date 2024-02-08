<?php

namespace App\Models;

use App\Models\Jobfair;
use App\Models\Kehadiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];

    /**
     * Get the user that owns the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jobfair(): BelongsTo
    {
        return $this->belongsTo(Jobfair::class, 'jobfair_id', 'id');
    }

    /**
     * Get all of the kehadiran for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kehadiran(): HasMany
    {
        return $this->hasMany(Kehadiran::class, 'event_id', 'id');
    }
}
