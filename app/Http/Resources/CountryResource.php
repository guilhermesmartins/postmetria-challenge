<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'name' => $this->name,
            'capital' => $this->capital,
            'region' => $this->region,
            'subregion' => $this->subregion,
            'population' => $this->population,
            'demonym' => $this->demonym,
            'nativeName' => $this->nativeName,
        ];
    }
}
