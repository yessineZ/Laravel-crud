@extends('layout')
@section('title','computer')
@section('content')
<div class="idk">
    <h1>Computer Show Page</h1>
    <h1>You are Welcome to Computer Page</h1>
    <div class="idk">
        <h3>{{$computer['name']}} is from {{$computer['Country']}} - {{$computer['price']}}$</h3>

    </div>
    <a href="{{route("Computers.edit",$computer["id"])}}" class="btn btn-primary">EDIT</a>
    <form action="{{ route('Computers.destroy', $computer->id) }}" method="post">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger" type="submit" value="Delete">
    </form>




</div>

@endsection