 {{ Session::get('message') }}
 <hr>
 @extends('Blog.master')
 @foreach($blogs as $blog)
            <div class="card" style="width: 29rem;">
            {{-- <img class="card-img-top" src=".../100px180/" alt="Card image cap"> --}}
            <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text">{{ $blog->subject }}</p>
            <a href="{{url('/blog/'.$blog->id)}}" class="btn btn-primary">Detail</a>
            <a href="{{url('/blog/'.$blog->id)}}/edit" class="btn btn-success">edit</a>

            <form action="{{ url('/blog/'.$blog->id) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
                <input type="submit" value="Hapus" class="btn btn-danger">
            </form>
            </div>
            </div>
            <div style="margin:10px;"></div>
@endforeach 