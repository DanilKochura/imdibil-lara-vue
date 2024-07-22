<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		return [
            "id"  => $this->id,
    "movie_id" => $this->movie_id,
    "date_at" => $this->date_at,
    "movie"  => $this->movie,
    "rates" => $this->rates
            ];

	}


}
