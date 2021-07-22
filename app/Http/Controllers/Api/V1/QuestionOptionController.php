<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Http\Resources\OptionsResource;
use App\Http\Requests\QuestionOptionRequest;

class QuestionOptionController extends Controller
{
    public function show(QuestionOption $option, Question $question)
    { $option = QuestionOption::all();
        dd($option);
       return new OptionsResource($option);
    }

    /**
     * Stores the options for the specific question
     *
     * @param  QuestionOptionRequest  $request
     * @param  Question  $question 
     * 
     * @return JsonResponse
     */
    public function store(QuestionOptionRequest $request, Question $question): JsonResponse
    {
        $options = $request->validated();

        foreach ($options['options'] as $option) {
            $question->options()->create(["option" => $option]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Succesfully added the option to the question'
        ]);
    }

    /**
     * update specific option
     *
     * @param  QuestionOptionRequest  $request
     * @param  Question  $question
     * @param  QuestionOption  $option 
     * 
     * @return JsonResponse
     */
    public function update(OptionRequest $request, Question $question, QuestionOption $option): JsonResponse
    {

        $question->options()
            ->where('id', $option->id)
            ->update($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Option is succesfully updated'
        ]);
    }

    /**
     * delete question option
     *
     * @param  Question  $question
     * @param  QuestionOption  $option 
     * 
     * @return JsonResponse
     */
    public function destroy(Question $question, QuestionOption $option)
    {
        $option->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Option is succesfully deleted'
        ]);
    }
    
}
