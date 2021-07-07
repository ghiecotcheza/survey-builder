<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class SurveyController extends Controller
{
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
     * Shows all the survey associated with the user. 
     *
     * @param  Survey  $survey
     * @return  View
     */
    public function index(Survey $survey): View
    { 
        $survey = auth()->user()->surveys()->orderBy('updated_at', 'desc')->get();
        
        return view('survey.show', compact('survey'));

    }

    /**
     * Create a new survey
     *
     * @return  View
     */
    public function create(): View
    {
        return view('survey.create');   
    }

    /**
     * Stores the newly created survey in the database. 
     * Validates the required fields and stores the data in the database.
     *
     * @param  mixed  $request
     * @var  array  $survey
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    { 
        $survey = request()->validate([
            'title'       => 'required',
            'description' => 'required'
        ]);

        $survey = auth()->user()->surveys()->create($survey);

        return redirect()->route('survey.show', $survey);
    }
    
    /**
     *Shows all the survey. 
     *
     * @param  Survey  $survey
     * @return View
     */
    public function show(Survey $survey): View
    {
        $survey->load('questions.options'); 

        return view('question.show', compact('survey'));
    }

    /**
     * Edit the survey
     *
     * @param  Survey  $survey
     * @return View
     */
    public function edit(Survey $survey): View
    {  
        return view('survey.edit', compact('survey'));
    }

    /**
     * Update the survey.
     * Validates and update the survey in the database.
     *
     * @param  Request  $request
     * @param Survey $survey
     * @return RedirectResponse
     */
    public function update(Request $request, Survey $survey): RedirectResponse
    {
        $surveyValidated = request()->validate([
            'title'       => 'required',
            'description' => 'required'
        ]);
       
        $survey = auth()->user()->surveys()->where('id', $survey->id)->update($surveyValidated);

        return redirect('survey/show')->with('status', 'Survey updated!');

    }
    /**
     * Delete the data from the database.
     *
     * @param  Survey $survey
     * @return RedirectResponse
     */
    public function destroy(Survey $survey): RedirectResponse
    { 
        $survey->delete();
        return redirect()->back();
    }
}
