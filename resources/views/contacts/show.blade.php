@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Contact') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>{{$contact->name}}</h2>
                    <h4>{{$contact->company}}</h4>
                    <h4>{{$contact->phone}}</h4>
                    <a>{{$contact->email}}</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection