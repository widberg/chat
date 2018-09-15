@extends('layouts.app')

@section('title', $room->name . ' - ' . config('app.name', 'Laravel'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You need to be invited to visit this room</div>

                <div class="panel-body">
                    The owner of this room has set it to invite-only. You must be a moderator or invited user to visit.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
