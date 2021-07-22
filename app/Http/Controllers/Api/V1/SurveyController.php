<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Survey;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SurveyResource;
use App\Http\Requests\SurveyRequest;
use App\Http\Resources\SingleSurveyResource;
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
        return new SingleSurveyResource(
            $survey->load([
                'questions',
                'questions.options',
                'questions.type'
            ])
        );
    }

    /**
     * Create a new survey
     *
     * @param  App\Http\Requests\SurveyRequest $request
     * 
     * @return  JsonResponse
     */
    public function store(SurveyRequest $request): JsonResponse
    {
        auth()->user()->surveys()->create($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'A new survey is successfully created.'
        ]);
    }

    /**
     * Update a survey.
     *
     * @param  SurveyRequest $request
     * @param  Survey $survey
     *
     * @return JsonResponse
     */
    public function update(Survey $survey, SurveyRequest $request): JsonResponse
    {
        $survey->update($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Succesfully updated survey.',
            'survey' => new SingleSurveyResource(
                $survey->load([
                    'questions',
                    'questions.options',
                    'questions.type'
                ])
            )
        ]);
    }

    /**
     * Delete a survey.
     *
     * @param  Survey $survey
     *
     * @return JsonResponse
     */
    public function destroy(Survey $survey): JsonResponse
    {
        $survey->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Succesfully delete survey'
        ]);
    }
}
