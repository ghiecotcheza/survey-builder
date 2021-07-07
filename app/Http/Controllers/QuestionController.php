<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create(Survey $survey)
    {
        return view('question.create' , ['survey' => $survey]);
    }


   
}
