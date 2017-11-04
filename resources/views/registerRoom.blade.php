@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Room</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('registerroom') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Room Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('visibility') ? ' has-error' : '' }}">
                                <label for="visibility" class="col-md-4 control-label">Visibility</label>

                                <div class="col-md-6">
                                    <select id="visibility" class="form-control" name="visibility" required>
                                        <option value=0{{ old('visibility') == 0 ? ' selected' : '' }}>Public</option>
                                        <option value=1{{ old('visibility') == 1 ? ' selected' : '' }}>Hidden</option>
                                        <option value=2{{ old('visibility') == 2 ? ' selected' : '' }}>Invite-Only</option>
                                    </select>

                                    @if ($errors->has('visibility'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('visibility') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <label for="g-recaptcha-response" class="col-md-4 control-label">Captcha</label>

                                <div class="col-md-6">
                                    {!! Recaptcha::render() !!}

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
