 @extends('Blog.master')
 @foreach($blogs as $blog)
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text">{{ $blog->subject }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
            <div style="margin:10px;"></div>
@endforeach 