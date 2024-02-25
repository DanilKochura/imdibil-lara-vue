<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizQuestionResource extends JsonResource
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
            "id" => $this->id,
            "question" => [
                'image' => asset('/images/quiz/'.$this->image),
                'text' =>$this->text
            ],
            "options" => QuizAnswerResource::collection($this->answers),
            "timer" => $this->time,
		];
	}


}
