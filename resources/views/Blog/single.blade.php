@extends('Blog.master')

@section('single')
    <p>{{ date('F, d, Y', strtotime($blog->updated_at)) }}</p>
    {{ date('F, d, Y', strtotime($blog->created_at)) }}

    <h2>halaman single</h2>
    <h2>{{$blog->title }}</h2>
    <br>
    <h4>{{$blog->subject }}</h4>
    <br>
    <form action="{{ url('/blog/'.$blog->id) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
                <input type="submit" value="Hapus" class="btn btn-danger">
            </form>

 
@endsection