@extends('layout')
@section('title','Create Computers')
@section('content')
<div class="max-w-dxl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Computers</h1>
    </div>
    <form action="{{route('Computers.store')}}" method="POST">
        @csrf
        <div>
            <label for="computer-name">Computer Name</label>
            <input id="computer-name" name="computer-name" value=" {{old('computer-Country')}}" type="text">
            @error('computer-name')
            <div class="error-message">
                {{$message}}

            </div>
            @enderror

        </div>
        <div>
            <label for="computer-origin">Computer Origin</label>
            <input id="computer-origin" value=" {{old('computer-Country')}}" name="computer-Country" type="text">
            @error('computer-Country')
            <div class="error-message">
                {{$message}}

            </div>
            @enderror
        </div>
        <div>
            <label for="computer-price">Computer Price</label>
            <input id="computer-price" name="computer-price" value=" {{old('computer-price')}}" type="number">
            @error('computer-price')
            <div class="error-message">
                {{$message}}

            </div>
            @enderror
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection