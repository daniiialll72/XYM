@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-4">
                <gym-card description="aaaaaaaaa" src="{{asset('storage/unnamed.jpg')}}"></gym-card>
            </div>
        </div>
    </div>
@endsection
