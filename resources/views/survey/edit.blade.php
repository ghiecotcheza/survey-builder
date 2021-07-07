@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Survey</div>
                    <div class="card-body shadow-lg">
                        <form action="{{ route('survey.update', ['survey' => $survey->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="surveyTitle">Survey Title</label>
                                <input type="text" name="title" value="{{ $survey->title }}" class="form-control" id="surveyTitle"
                                    aria-describedby="titleHelp" placeholder="Survey Title">
                                <small id="titlelHelp" class="form-text text-muted">Give your survey a unique and
                                    descriptive title.</small>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="surveyDescription">Description</label>
                                <input type="text" name="description" value="{{ $survey->description }}" class="form-control" id="surveyDescription"
                                    placeholder="Description">
                                <small id="surveyDescriptionlHelp" class="form-text text-muted">Write a short description of
                                    the survey.</small>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update this survey</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
