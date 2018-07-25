@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    {{ $profileUser['name'] }}
                {{--<avatar-form :user="{{ $profileUser }}"></avatar-form>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
