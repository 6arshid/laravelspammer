@extends('layouts.app') @section('title',app('request')->zoomsearch)



@section('content')

<div class="row justify-content-center mt-4 p-5">
<form method="POST" action="/s/add_wnumber">
@csrf
<textarea class="form-control" name="numbers"></textarea>
<input type="submit" class="btn btn-info" value="add">
</form>
</div>

    @endsection

