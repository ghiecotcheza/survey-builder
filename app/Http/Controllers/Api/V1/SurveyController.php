<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SurveyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;



class SurveyController extends Controller
{
    /**
     * Get all the surveys
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    { 
        return SurveyResource::collection(Survey::all());
    }

    /**
     * Retrieve one specific survey
     *
     * @param Survey $survey
     * 
     * @return SurveyResource
     */
    public function show(Survey $survey)
    {  
      
    }

    /**
     * Create a new survey
     *
     * @return 
     */
    public function store()
    {
       
    }
}
