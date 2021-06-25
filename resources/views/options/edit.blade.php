@extends('layouts.app')

@section('content')
<form action="{{ route('option.update', ['survey' => $survey->id, 'question' => $question->id]) }}" method="GET">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $question->question }}</div>
                    <div class="card-body shadow-lg">
                        <div class="form-group">
                            <fieldset>
                                <div class="form-group">  
                                    <input type="text" name="options[][option]" value="{{ $options->count() > 0 ? $options[0]->option : '' }}"
                                        class="form-control" id="surveyoption1" placeholder="Option 1">
                                    @error('options.0.option')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- If it exist, need to retrieve the value of every options --}}
                                <div>
                                    <div class="form-group">
                                        <input type="text" name="options[][option]"
                                            value="{{ $options->count() > 0 ? $options[1]->option : ''  }}" class="form-control"
                                            id="surveyoption2" placeholder="Option 2">
                                        @error('option.1.option')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <input type="text" name="options[][option]"
                                            value="{{ $options->count() > 0 ? $options[2]->option : '' }}" class="form-control"
                                            id="surveyoption3" placeholder="Option 3">
                                        @error('options.2.option')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <input type="text" name="options[][option]"
                                            value="{{ $options->count() > 0 ? $options[3]->option : '' }}" class="form-control"
                                            id="surveyoption4" placeholder="Option 4">
                                        @error('options.3.option')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Update Options</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection