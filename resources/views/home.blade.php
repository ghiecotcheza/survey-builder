@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="{{ route('survey.index') }}" class="btn btn-primary mr-4">Show all my Survey</a>
                    <a  href="{{ route('survey.new') }}" class="btn btn-primary">Create a new Survey</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
