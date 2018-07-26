@extends('scoring.layout.app')

@section('scoring-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header" style="background-color: #98e1b7">Dashboard</h5>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are on the scoring dashboard.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection