<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'judul' => 'required',
            'body' => 'required',
            'gambar' => 'required|mimes:jpg,png,bmp,jpeg'
        ]);
        $slug = Str::slug($request->judul);

        $post = new Post();
        $post->judul = $request->judul;
        $post->user_id = Auth::id();
        $post->slug = $slug;
        $post->body = $request->body;

        //jika gambar tidak diisi
        $image_path = "";
        //jika gambar diisi
        if ($request->hasFile('gambar')) {
            $image = $request->gambar;
            $namaGambar = time().$image->getClientOriginalName();
            $image->move('post/', $namaGambar);
            //jika gambar tidak diupload maka tidak diisi nama file
            $image_path = 'post/'.$namaGambar;
        }

        $post->gambar = $image_path;

        $post->save();
        Toastr::success('Artikel berhasil ditambahkan', 'success');
        return redirect()->route('admin.post.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
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
        //Validasi
        $this->validate($request, [
            'judul' => 'required|max:40',
            'gambar' => 'sometimes|mimes:jpeg,jpg,png,bmp|max:10000',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $slug = Str::slug($request->judul);

        $post->user_id = Auth::id();
        $post->judul = $request->judul;
        $post->slug = $slug;
        $post->body = $request->body;

        if ($request->hasFile('gambar')) {
            if (file_exists($post->gambar)) {
                unlink($post->gambar);
            }

            $image = $request->gambar;
            $namaGambar = time().$image->getClientOriginalName();
            $image->move('post/', $namaGambar);
            //jika gambar tidak diupload maka tidak diisi nama file
            $post->gambar = 'post/'.$namaGambar;
        }

        $post->save();
        Toastr::success('Artikel berhasil diubah', 'success');

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //delete gambar jika masih ada
        if (file_exists($post->gambar)) {
            unlink($post->gambar);
        }
        $post->delete();

        Toastr::success('Artikel berhasil dihapus', 'success');

        return redirect()->route('admin.post.index');
    }

    public function downloadPDF($id)
    {
        $post = Post::findOrFail($id);

        $pdf = PDF::loadView('admin.post.cetak_berita', compact('post'));
        return $pdf->download('artikel.pdf');
    }
}
