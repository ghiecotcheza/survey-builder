<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class SingleSurveyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Survey'            => [
                'id'            => $this->id,
                'title'         => $this->title,
                'description'   => $this->description,
                'Questions'     => QuestionResource::collection($this->questions)
            ]

        ];
    }
}
