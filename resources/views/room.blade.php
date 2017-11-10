@extends('layouts.app')

@section('title', $room->name)

@section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/7fb48413eb.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $room->name }}<i class="fa fa-info-circle fa-2x pull-right align-middle" title="info" @click="info"></i></div>

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

@section('scripts')
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
@endsection
