@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-offset-1">
                <img src="{{ URL::asset("assets/images/".Auth::user()->image)}}" class="rounded-circle" alt="image" height="150px" width="150px" style="float:left; border-radius:50%; margin-right: 25px">
                <h2>{{ Auth::user()->name}}'s Profile</h2>
                <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                    @csrf
                    <label>Update Profile Image</label><br/>
                    <input type="file" name="image">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="pull-right btn btn-sm btn-primary">Submit</button>
                </form>
        </div>
    </div>
</div>

@endsection
@section('js')
@endsection
