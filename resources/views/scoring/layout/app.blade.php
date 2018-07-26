@extends('layouts.app')

@section('sidebar')
    <aside>
        <div class="card mb-4">
            <h5 class="card-header text-center" style="background-color: #98e1b7">Scoring</h5>

            <ul class="card-body">
                <li class="nav-link pl-0">
                    <a href="{{ route('scoring.dashboard.index') }}" style="font-size: small">Scoring Dashboard</a>
                </li>

                <li class="nav-link pl-0">
                    <a href="{{ route('scoring.summary.show') }}" style="font-size: small">Match Summary</a>
                </li>

                <li class="nav-link pl-0">
                    <a href="{{ route('scoring.game.show') }}" style="font-size: small">Score a Game</a>
                </li>
            </ul>
        </div>

        <div class="card">
            <h5 class="card-header text-center" style="background-color: #a1cbef">School Info</h5>

            <ul class="card-body">
                <li class="nav-link pl-0">
                    <a href="{{ route('admin.dashboard.index') }}" style="font-size: small">Admin Dashboard</a>
                </li>

                <li class="nav-link pl-0">
                    <a href="{{ route('admin.school.show') }}" style="font-size: small">School</a>
                </li>

                <li class="nav-link pl-0">
                    <a href="{{ route('admin.team.show') }}" style="font-size: small">Team Roster</a>
                </li>
            </ul>
        </div>
    </aside>
@endsection

@section('content')
    {{--<div class="py-6">--}}
    @yield('scoring-content')
    {{--</div>--}}
@endsection
