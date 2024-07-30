<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThirdResource extends JsonResource
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
         "movies" => [$this->firstMovie, $this->secondMovie, $this->thirdMovie],
            "selected" => $this->selected_id,
            "user_id" => $this->user_id
            ];

	}


}
