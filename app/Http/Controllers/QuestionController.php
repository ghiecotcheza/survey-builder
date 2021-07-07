<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question;
use App\Models\QuestionType;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Contracts\View\View;


class QuestionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Question Controller
    |--------------------------------------------------------------------------
    | This controller handles the showing, creating, editing, updating 
    | and deleting questions. 
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new question.
     * 
     * @param  Survey  $survey 
     * @var  QuestionTypes  $questionTypes
     * @return View
     */
    public function create(Survey $survey): View
    {
        $questionTypes = QuestionType::all();
        return view('question.create', compact('survey', 'questionTypes',));
    }

    /**
     * Stores the newly created question in the database. 
     * Validates the required fields and then store the question in the database. 
     * 
     * @param  Survey  $survey
     * @param  Question  $question
     * @return RedirectResponse
     */
    public function store(Survey $survey, Question $question): RedirectResponse
    {
        $question = request()->validate([

            'question'          => 'required',
            'question_type_id'  => 'required'

        ]);
        $question = $survey->questions()->create($question);
    
        return redirect()->route('options', ['survey' => $survey->id, 'question' => $question->id]);
    }

    /**
     * Edit the question
     * 
     * @param  Survey  $survey
     * @param  Question   $question
     * @param  QuestionType  $questionType
     * @var  array  $questionTypes
     * @return View
     */
    public function edit(Survey $survey, Question $question, QuestionType $questionType): View
    { 
        $questionTypes = QuestionType::all();

        return view('question.edit', compact('survey', 'question', 'questionTypes'));
    }

    /**
     * Update the data in the database. 
     * Validates the required fields and then update the record in the database.
     * 
     * @param  Survey  $survey
     * @param  Question  $question
     * @param  QuestionType  $questionType
     * @var  string  $keyname
     * @var  mixed  $questionValidated
     * @return  mixed
     */
    public function update(Survey $survey, Question $question, QuestionType $questionType)
    {    
        $questionValidated = request()->validate([
            'question'          => 'required',
            'question_type_id'  => 'required'
        ]); 

        $survey->questions()->where('id', $question->id)
            ->update($questionValidated); 
        $question->refresh();
        $keyname = $question->load(['type'])->type->keyname;
        
        if (in_array($keyname, ['multiple-choice'])) { 
            return redirect()->route('option.edit', ['survey' => $survey->id, 'question' => $question->id]);
        }

        if (in_array($keyname, ['short-answer', 'paragraph'])) {
            $question->options()->delete(); 
            return view('question.show', compact('survey', 'question'));
        } 
    }

    /**
     * Deletes the question and the options associated with this question. 
     * 
     * @param  Survey  $survey
     * @param  Question  $question
     * @return RedirectResponse
     */
    public function destroy(Survey $survey, Question $question): RedirectResponse
    {
        $survey->load('questions.options');
        $question->options()->delete();
        $question->delete();
        return redirect()->back();
    }
}
