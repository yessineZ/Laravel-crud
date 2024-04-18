@extends('layout')
@section('title','computer')
@section('content')
<link rel="stylesheet" href="{{ URL('css/styles.css') }}">
<div class="idk">
    <h1>Computer Page</h1>
    <h1>You are Welcome to Computer Page</h1>
    @if(count($computers) > 0 )
    <ul>

        <table class="computer-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Price</th>
                    <th>Show Page</th>
                </tr>
            </thead>
            <tbody>
                @foreach($computers as $comp)
                <tr>
                    <td>{{ $comp['name'] }}</td>
                    <td>{{ $comp['Country'] }}</td>
                    <td>{{ $comp['price'] }}$</td>
                    <td>
                        <a class= "btn btn-primary" href="{{ route('Computers.show', ['Computer' => $comp['id']]) }}">
                            edit {{ $comp['name'] }}
                        </a>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>


    </ul>
    @else
    <p>There is no computers to Display</p>
    @endif





</div>

@endsection