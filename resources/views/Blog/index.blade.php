 {{ Session::get('message') }}
 <hr>
 @extends('Blog.master')
<a href="{{ url('/blog/create') }}">
  <button class="btn btn-warning col-1 offset-9 " >Tambah</button>
</a>
 <center>
   <br>
     <table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Isi</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
@foreach($blogs as $blog)
    <tr>
    <th scope="row">{{ $blog->id }}</th>
      <td>{{ $blog->title }}</td>
      <td>{{ $blog->subject }}</td>
      <td>  <a href="{{url('/blog/'.$blog->slug)}}" class="btn btn-primary">Detail</a>
            <a href="{{url('/blog/'.$blog->id)}}/edit" class="btn btn-success">edit</a>
            
        </td>
    </tr>
@endforeach
  </tbody>
</table>
 </center>
 {{ $blogs->links() }}
