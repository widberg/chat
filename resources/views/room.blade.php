@extends('layouts.app')

@section('title', $room->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $room->name }}</div>

                <div class="panel-body">
                    @if(Auth::check())
                        You are logged in!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
