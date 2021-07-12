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
            'question'      => $this->question,
            'questionType'  => $this->question_type_id,
            'options'       => OptionsResource::collection($this->options)
        ];
    }
}
