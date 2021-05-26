@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $survey->title }}</h2></div>
                    <div class="card-body shadow-lg">
                        <div>
                            {{ $survey->description }}
                        </div>
                        <a href="{{ url('/survey'.'/'. $survey->id . '/question/create' ) }}" class="btn btn-primary mt-3">Add questions</a>
                    </div>

                </div>

            </div>

        </div>

    </div>


@endsection
