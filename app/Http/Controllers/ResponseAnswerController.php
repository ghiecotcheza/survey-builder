<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\ResponseAnswer;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResponseAnswerController extends Controller
{  

     /**
     * Shows the survey to be responded 
     *
     * @param  Survey  $survey
     * @param  Question  $question
     * @return  View
     */
    public function show(Survey $survey, Question $question)
    {
        return view('response.show', compact('survey', 'question'));
    }

     /**
     * Stores the data in responses and response_answers table
     *
     * @param  Request  $request
     * @param  Survey  $survey
     * @param  Question  $question
     * @param  Response  $response
     * @return  Response
     */
    public function store(Request $request, Survey $survey, Response $response, StorePostRequest $storePostRequest)
    {
        $responses = request()->validate([
            'answer.*.answer'             => 'required',
            'answer.*.question_id'        => 'required'
        
        ]);
 
        $responderId = Auth::id();
        $response =  $survey->responses()->create(['user_id' => $responderId, $request->all()]);
        
        foreach ($responses['answer'] as $answer) {
            $answer = $response->answers()->create([
              'question_id'    => $answer['question_id'],
              'answer'         => $answer['answer']
        ]); 
        } 
    }
}
