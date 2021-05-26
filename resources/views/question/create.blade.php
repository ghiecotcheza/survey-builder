@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $survey->title }}</div>
                <div class="card-body shadow-lg">
                    <form action="{{ url('/'. $survey->id . '/questions') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="survey">Question</label>
                          <input type="text" name="question[question]" class="form-control" id="surveyquestion" aria-describedby="questionHelp" placeholder="Write your question here">
                          @error('question.question')
                          <small class="text-danger">{{ $message }}</small>  
                          @enderror
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <div>
                                    <div class="form-group"> 
                                        <input type="text" name="answers[][answer]" class="form-control" id="surveyoption1" placeholder="Option 1">
                                        @error('answers.0.answer')
                                        <small class="text-danger">{{ $message }}</small>  
                                        @enderror
                                      </div>
                                </div>
                                <div>
                                    <div class="form-group"> 
                                        <input type="text" name="answers[][answer]" class="form-control" id="surveyoption1" placeholder="Option 2">
                                        @error('answers.1.answer')
                                        <small class="text-danger">{{ $message }}</small>  
                                        @enderror
                                      </div>
                                </div>
                                <div>
                                    <div class="form-group"> 
                                        <input type="text" name="answers[][answer]" class="form-control" id="surveyoption1" placeholder="Option 3">
                                        @error('answers.2.answer')
                                        <small class="text-danger">{{ $message }}</small>  
                                        @enderror
                                      </div>
                                </div>
                                <div>
                                    <div class="form-group"> 
                                        <input type="text" name="answers[][answer]" class="form-control" id="surveyoption1" placeholder="Option 4">
                                        @error('answers.3.answer')
                                        <small class="text-danger">{{ $message }}</small>  
                                        @enderror
                                      </div>
                                </div>
                                {{-- <button type="submit" class="btn btn-primary">Add more options</button> --}}
                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary">Add new question</button>
                      </form>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection