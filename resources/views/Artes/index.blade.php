@extends('layouts.app') 

@section('content')
    <h1>view index</h1>
    <p>{{Auth::user()->id}}</p>
    <p>{{Auth::user()->name}}</p>
    <p>{{Auth::user()->email}}</p>
@endsection

