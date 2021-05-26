<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use SebastianBergmann\Environment\Runtime;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('survey.create');   
    }

    public function store(Request $request)
    { 
        $survey = request()->validate([
            'title'       => 'required',
            'description' => 'required'
        ]);

        $survey = auth()->user()->surveys()->create($survey);

        return redirect()->route('survey.show', $survey);
    }
    
    public function show(Survey $survey)
    {
        return view('survey.show', ['survey' => $survey]);
    }
}
