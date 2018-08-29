 {{ Session::get('message') }}
 @extends('Blog.master')
 @foreach($blogs as $blog)
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text">{{ $blog->subject }}</p>
            <a href="{{url('/blog/'.$blog->id)}}" class="btn btn-primary">Detail</a>
            <a href="{{url('/blog/'.$blog->id)}}/edit" class="btn btn-success">edit</a>
            </div>
            </div>
            <div style="margin:10px;"></div>
@endforeach 