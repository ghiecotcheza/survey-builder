<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Survey;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SurveyResource;
use App\Http\Requests\CreateSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
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
                'questions.options'
            ])
        );
    }

    /**
     * Create a new survey
     *
     * @param  App\Http\Requests\CreateSurveyRequest $request
     * 
     * @return  JsonResponse
     */
    public function store(CreateSurveyRequest $request): JsonResponse
    {
        $survey = auth()->user()->surveys()->create($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'A new survey is successfully created.'
        ]);
    }

    /**
     * Update a survey.
     *
     * @param  UpdateSurveyRequest $request
     * @param  Survey $survey
     *
     * @return JsonResponse
     */
    public function update(Survey $survey, UpdateSurveyRequest $request): JsonResponse
    {
        $survey->update($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Succesfully updated survey.',
            'Survey' => new SingleSurveyResource(
                $survey->load([
                    'questions',
                    'questions.options'
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
