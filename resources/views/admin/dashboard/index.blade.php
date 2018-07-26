@extends('admin.layout.app')

@section('administration-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header" style="background-color: #a1cbef">Dashboard</h5>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are on the administration dashboard.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
