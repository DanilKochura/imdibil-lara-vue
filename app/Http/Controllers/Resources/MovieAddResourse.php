<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieAddResourse extends JsonResource
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
			"label" => $this->name_m,
            "url" => "#",
            "id" => $this->id,
            "disabled" => false
		];
	}


}
