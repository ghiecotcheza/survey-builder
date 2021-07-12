<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;


class QuestionController extends Controller
{
    /**
     * Create a new question 
     *
     * @param  QuestionRequest $request
     * @param  Survey $survey
     * 
     * @return  JsonResponse
     */
    public function store(QuestionRequest $request, Survey $survey ): JsonResponse
    {
        $survey->questions()->create($request->validated());
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Question had been succesfully added to the survey.'
        ]);
    }

     /**
     * Create a new question 
     *
     * @param  QuestionRequest $request
     * @param  Question $question
     * 
     * @return  JsonResponse
     */
    public function update(QuestionRequest $request, Question $question): JsonResponse
    {
        $question->update($request->validated());
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Question had been succesfully updated.'
        ]);
    }

    /**
     * Delete de question and the options associated with this question
     *
     * @param  Question $question
     * @param  Survey $survey
     *
     * @return JsonResponse
     */
    public function destroy(Survey $survey, Question $question)
    { 
        $question->load('options');
        $question->options()->delete();
        $question->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Succesfully deleted the question'
        ]);
    }

}