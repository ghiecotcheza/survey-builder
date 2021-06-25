@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ $survey->title }}</h2></div>
                    <div class="card-body shadow-lg">
                        <form action="{{ route('question.update', ['survey' => $survey->id, 'question' => $question->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="survey">Question</label>
                                <input type="text" name="question" value="{{ $question->question }}"
                                    class="form-control" id="surveyquestion" aria-describedby="questionHelp"
                                    placeholder="Write your question here">
                                @error('question')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror 
                                <div class="btn-group">
                                    <div class="dropdown mt-3">
                                        <select name="question_type_id" class="form-control"> 
                                        @foreach ($questionTypes as $questionType)
                                        <option class="dropdown-item" value="{{ $questionType->id }}" {{ ($question->question_type_id == $questionType->id) ? 'selected' : '' }}>{{ $questionType->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection
