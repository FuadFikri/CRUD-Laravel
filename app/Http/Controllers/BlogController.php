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
        $blogs = Blog::all();
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

        $blog->save();
        return redirect('blog')->with('message','sudah tersimpan');
        //  opsi lain pakai mass assignment
        // $blog = Blog::create(['title' => $request->title, 'subject' => $request->subject]);
        // Tapi harus bikin protected fillable di model biar ga keisis semua
        
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        if(!$blog){
            abort(404);
        }
        return view('Blog.single')->with('blog', $blog);

 
    }

    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
