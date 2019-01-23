@extends('layouts.my_template')

@section('title', 'show post')

@section('content')


    <h1>{{ $posts->title }}</h1>
    <h2>{{ $posts->content }}</h2>

@stop
