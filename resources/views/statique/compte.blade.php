@extends('layout')
@section('content')
{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
@endsection