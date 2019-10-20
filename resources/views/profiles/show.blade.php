@extends('layouts.base')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <avatar-form :scorer ="{{ $profileScorer }}"></avatar-form>
        </div>
    </div>
@endsection
