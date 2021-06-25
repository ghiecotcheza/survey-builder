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
                        <a href="{{ route('question.create',['survey' => $survey->id]) }}"
                            class="btn btn-primary mt-3">Add a New Question</a>
                        <a href="{{ route('response.show',['survey' => $survey->id, 'surveyTitle' => Str::slug($survey->title)]) }}"
                            class="btn btn-primary mt-3">Take the survey</a>
                    </div>
                </div>
                @foreach ($survey->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong
                                class="mr-1">{{ $key + 1 }}</strong>{{ $question->question }}</div>
                        <div class="card-body shadow-sm">
                            <ul class="list-group">
                                @foreach ($question->options as $option)
                                    <label for="option{{ $option->id }}">
                                        <li class="list-group-item">
                                            <input type="radio" name="#" id="option{{ $option->id }}" class="mr-1">
                                            {{ $option->option }}
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                            @if ($question->type->keyname === 'short-answer')
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="textarea" name="shortAnswer" value="{{ old('shortAnswer') }}"
                                            class="form-control" id="shortAnswer" placeholder="Write your answer here"
                                            style="height: 60zÆZpx">
                                        @error('shortAnswer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if ($question->type->keyname === 'paragraph')
                                <div class="card-body ">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="paragraphTextArea"
                                            placeholder="Write your answer here" id="paragraphTextArea"
                                            style="height: 150px"></textarea>
                                    </div>
                                </div>
                            @endif
                            <div class="d-flex justify-content-end">
                                <div>
                                    <form
                                        action="{{ route('question.edit', ['survey' => $survey->id, 'question' => $question->id]) }}"
                                        method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                              </svg>
                                        </button>
                                    </form>
                                </div>
                                <form
                                    action="{{ route('question.delete',['survey' => $survey->id, 'question' => $question->id]) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <div class="ml-3">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13"
                                                height="13">
                                                <path fill-rule="evenodd"
                                                    d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z">
                                                </path>
                                                <path
                                                    d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z">
                                                </path>
                                                <path
                                                    d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
