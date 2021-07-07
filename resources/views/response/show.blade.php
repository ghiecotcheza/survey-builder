@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $survey->title }}</h2>
                    </div>
                    <div class="card-body shadow-sm">
                        <div>
                            {{ $survey->description }}
                        </div>
                    </div>
                </div>
                <form
                    action="{{ route('response.store', ['survey' => $survey->id, 'surveyTitle' => Str::slug($survey->title)]) }}"
                    method="post">
                    @csrf
                    @foreach ($survey->questions as $key => $question)
                        <div class="card mt-4">
                            <div class="card-header"><strong
                                    class="mr-1">{{ $key + 1 }}</strong>{{ $question->question }}</div>
                            <div class="card-body shadow-sm">
                                <ul class="list-group">
                                    @foreach ($question->options as $option)
                                        <label for="option{{ $option->option }}">
                                            <li class="list-group-item">
                                                <input type="radio" name="answer[{{ $key }}][answer]"
                                                    id="option{{ $option->option }}" 
                                                    {{ (old('answer.'. $key . '.answer') == $option->option) ? 'checked' : ''}}
                                                    value="{{ $option->option }}"
                                                    class="mr-1">
                                                {{ $option->option }} 
                                                <input type="hidden" name="answer[{{ $key }}][question_id]"
                                                    value="{{ $question->id }}">
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                                @if ($question->type->keyname === 'short-answer')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="textarea" name="answer[{{ $key }}][answer]"

                                                value="{{ old('answer.' . $key . '.answer') }}" class="form-control" id="answer"
                                                placeholder="Write your answer here" style="height: 60px">
                                            <input type="hidden" name="answer[{{ $key }}][question_id]"
                                                value="{{ $question->id }}">
                                        </div>
                                    </div>
                                @endif
                                @if ($question->type->keyname === 'paragraph')
                                    <div class="card-body ">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="answer[{{ $key }}][answer]"
                                                placeholder="Write your answer here" id="answer"
                                                value="{{ old('answer.' . $key . '.answer') }}" style="height: 150px"></textarea>
                                            <input type="hidden" name="answer[{{ $key }}][question_id]"
                                                value="{{ $question->id }}">
                                        </div>
                                    </div>
                                @endif
                                @error('answer.' . $key . '.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="card mt-4">
                        <div class="card-body shadow-lg">
                            <div class="form-group">
                                <label for="surveyTitle">Name</label>
                                <input type="text" name="name" class="form-control" id="username"
                                    aria-describedby="titleHelp" placeholder="Name">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="surveyDescription">E-mail address</label>
                                <input type="email" name="email" class="form-control" id="userEmail"
                                    placeholder="E-mail address">
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary mt-2">Finish and send the survey</button>
                </form>
            </div>
        </div>
    </div>
@endsection
