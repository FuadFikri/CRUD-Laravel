@extends('Blog.master')

@section('single')
    <h2>halaman single</h2>
    {{$blog->title }}
    <br>
    {{$blog->subject }}

@endsection