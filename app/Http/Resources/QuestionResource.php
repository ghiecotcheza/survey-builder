<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'question id'   => $this->id,
            'question'      => $this->question,
            'questionType'  => new QuestionTypesResource($this->type),
            'options'       => OptionsResource::collection($this->options)
        ];
    }
}
