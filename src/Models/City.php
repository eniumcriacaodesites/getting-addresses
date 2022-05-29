<?php

namespace EniumCriacaoSites\GettingAddresses\Models;

use EniumCriacaoSites\GettingAddresses\Filters\CityFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{

    protected $fillable = ['name', 'state_id', 'ibge_id'];

    /**
     * @return BelongsTo
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}