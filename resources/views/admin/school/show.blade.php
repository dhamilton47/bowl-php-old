@extends('admin.layout.app')

@section('administration-content')
    <div class="container">
        {{--@include('breadcrumbs')--}}

        <div class="card">
            <h5 class="card-header" style="background-color: lightpink">
                School Administration Landing Page
            </h5>

            <div class="card-body">
                <div class="flex mb-6 pb-4">
                    <div class="flex-1">
                        <h3 class="">{{ $school->name }}</h3>

                        <h5 class="">{{ $school->city }}, {{ $school->state }}</h5>

                        <h5 class="">District: {{ $school->district }}</h5>
                    </div>
                    {{--<button class="submit">Edit</button>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
