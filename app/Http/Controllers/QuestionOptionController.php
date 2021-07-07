<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\QuestionOption;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuestionOptionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | QuestionOption Controller
    |--------------------------------------------------------------------------
    | This controller handles the creating, editing, updating 
    | and deleting options that is associated to the specific question
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
     * Handles the different options based on selected question type.
     * 
     * @param  Survey  $survey 
     * @param  Question  $question
     * @param  QuestionType  $questionType
     * @var  string  $keyname
     *
     */
    public function options(Survey $survey, Question $question, QuestionType $questionType)
    {
        $keyname = $question->load(['type'])->type->keyname;

        if (in_array($keyname, ['multiple-choice'])) { 
            return view('options.multiple_choice', compact('survey', 'question', 'questionType'));
        }

        if (in_array($keyname, ['short-answer', 'paragraph'])) {
            return view('question.show', compact('survey', 'question', 'questionType'));
        }
    }

    /**
     * Stores the options associated to the question.
     *
     * @param  Request  $request
     * @param  Survey  $survey
     * @param  Question  $question
     * @param  QuestionType  $questionType
     * @var  string  $keyname
     * @var  array  $options
     * @return RedirectResponse
     */
    public function store(Request $request, Survey $survey, Question $question, QuestionType $questionType): RedirectResponse
    {
        $keyname = $question->load(['type'])->type->keyname;

        if (in_array($keyname, ['multiple-choice'])) {
            $options = request()->validate([
                'options.*.option'          => 'required'
            ]);

            $question->options()
                ->createMany($options['options']);

            return redirect()->route('survey.show', ['survey' => $survey->id]);
        }
    }

    /**
     * Edit the options associated with the question. 
     *
     * @param  Survey  $survey
     * @param  Question  $question
     * @var  array  $options
     * @return View
     */
    public function edit(Survey $survey, Question $question): View
    {
        $keyname = $question->load(['type'])->type->keyname;

        if (in_array($keyname, ['multiple-choice'])) { 
            $options = QuestionOption::where('question_id', $question->id)->get();

            return view('options.edit', compact('survey', 'question', 'options'));
        }

        if (in_array($keyname, ['short-answer', 'paragraph'])) {
            $question->options()->delete(); 
            return view('question.show', compact('survey', 'question'));
        } 

    }


    /**
     * Update the options associated with the question.
     *
     * @param  Request  $request
     * @param  Survey  $survey
     * @param  Question  $question
     * @var  array  $options
     * @return RedirectResponse
     */
    public function update(Request $request, Survey $survey, Question $question): RedirectResponse
    {  
        $keyname = $question->load(['type'])->type->keyname;
    
        if (in_array($keyname, ['multiple-choice'])) {
            $options = request()->validate([
            'options.*.option'          => 'required'
        ]);

            $question->options()->delete();

            $question->options()
            ->createMany($options['options']);

            return redirect()->route('survey.show', ['survey' => $survey->id]);
        }

        if (in_array($keyname, ['short-answer', 'paragraph'])) { 
            return view('question.show', compact('survey', 'question', 'questionType'));
        } 

    }
}
