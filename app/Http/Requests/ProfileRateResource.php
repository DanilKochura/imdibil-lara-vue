<?php

namespace App\Http\Requests;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileRateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
			return [
				'rate' => $this->rate,
                'movie_name' => $this->movie->movie->name_m,
                'movie_poster' => asset("https://imdibil.ru/images/posters/".$this->movie->movie->poster)
			];
    }
}
