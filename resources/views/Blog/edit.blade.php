@extends('Blog.master')
@section('edit')
{{-- 
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --> --}}
<h2>Create</h2>
<form action="{{ url('/blog/'.$blog->id) }}" method="post">
  <div class="form-group">
  {{ ($errors->has('title')) ? $errors->first('title') : " "  }}
  <input type="text" class="form-control" name="title"  value="{{ $blog->title }}"placeholder="Enter Title">
    
    
    {{ ($errors->has('subject')) ? $errors->first('subject') : " "  }}
    <textarea name="subject" id="subject" class="form-control" placeholder="subject" >{{ $blog->subject}}</textarea>
    
    <br>
     <input type="hidden" name="_method" value="put"> {{--biar tau kalo put. karena di form harus post/get --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Simpan">
  </div>
</form>  
@endsection