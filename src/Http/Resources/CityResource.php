<?php

namespace EniumCriacaoSites\GettingAddresses\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'ibge_id' => (int) $this->ibge_id,
            'state' => $this->state
        ];
    }
}