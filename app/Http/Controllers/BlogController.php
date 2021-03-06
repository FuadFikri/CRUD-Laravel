<?php


namespace App\Http\Controllers;


use App\Model\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blogs = Blog::distinct('id',0)
              ->orderBy('created_at','desc')
              ->paginate(3);
              
        // $blogs  = DB::table('blog')->paginate(3); harus use DB
        return view('Blog.index', ['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Blog.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'     => 'required|unique:blog|min:5',
            'subject'   => 'required',
        ]);

        $blog = New Blog;
        $blog->title    = $request->title;
        $blog->subject  = $request->subject;
        $blog->slug     = str_slug($request->title, '-');

        $blog->save();
        return redirect('blog')->with('message','sudah tersimpan');
        //  opsi lain pakai mass assignment
        // $blog = Blog::create(['title' => $request->title, 'subject' => $request->subject]);
        // Tapi harus bikin protected fillable di model biar ga keisis semua
        
    }

    public function show($slug)
    {
        // $blog = Blog::find($id);
        $blog = Blog::where('slug',$slug)->first();
        if(!$blog){
            abort(404);
        }
        return view('Blog.single')->with('blog', $blog);

 
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('Blog.edit ')->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'     => 'required|min:5',
            'subject'   => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->title    = $request->title;
        $blog->subject  = $request->subject;
        $blog->slug     = str_slug($request->title, '-');

        $blog->save();
        return redirect('blog')->with('message','sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('blog')->with('message','sudah dihapus');

    }
}
