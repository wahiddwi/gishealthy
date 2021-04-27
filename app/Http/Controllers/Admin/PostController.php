<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $gambar = $request->gambar;
        $namaGambar = $slug . '-' . Carbon::now()->timestamp . '.' . $gambar->getClientOriginalExtension();
        //cek folder gambar
        if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');

        }
        //Img Crop
        $img = Image::make($gambar)->resize(752, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->stream();

        Storage::disk('public')->put('post/'. $namaGambar, $img);

        $post = new Post();
        $post->judul = $request->judul;
        $post->user_id = Auth::id();
        $post->slug = $slug;
        $post->gambar = $namaGambar;
        $post->body = $request->body;
        
        $post->save();
        Toastr::success('Artikel berhasil ditambahkan', 'success');
        return redirect()->route('admin.post.index');


        // $gambar = $request->gambar;
        // $new_gambar = time().$gambar->getClientOriginalName();

        // $posts = Post::create(request([
        //     'judul' => $request->judul,
        //     'body' => $request->body,
        //     'gambar' => 'public/uploads/posts/'.$new_gambar,
        //     // 'slug' => Str::slug($request->judul),
        //     'users_id' => Auth::id(),
        // ]));

        // $gambar->move('public/uploads/posts/', $new_gambar);

        // return redirect()->route('admin.post.index')->with('success', 'Tulisan Berhasil Ditambahkan');
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
            'judul' => 'required',
            'gambar' => 'sometimes|mimes:jpeg,jpg,png,bmp|max:10000',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $slug = Str::slug($request->judul);
        if (isset($request->gambar)) {
            $gambar = $request->gambar;
            $namaGambar = $slug . '-' . Carbon::now()->timestamp . '.' . $gambar->getClientOriginalExtension();
            //cek folder gambar
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');

            }
            //hapus gambar lama
            if (!Storage::disk('public')->exists('post/'. $post->gambar)) {
                Storage::disk('public')->delete('post/'. $post->gambar);
            }
            $postGambar = Image::make($gambar)->resize(752, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();
            //disimpan di folder
            Storage::disk('public')->put('post/' . $namaGambar, $postGambar); //metode put dapat digunakan untuk menyimpan konten raw file pada disk
        } else {
            # jika gambar tidak diubah tetap post bisa disimpan
            $namaGambar = $post->gambar;
        }
        $post->user_id = Auth::id();
        $post->judul = $request->judul;
        $post->slug = $slug;
        $post->gambar = $namaGambar;
        $post->body = $request->body;

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
        if (!Storage::disk('public')->exists('post/'. $post->gambar)) {
            Storage::disk('public')->delete('post/'. $post->gambar);
        }
        $post->delete();
        
        Toastr::success('Artikel berhasil dihapus', 'success');

        return redirect()->route('admin.post.index');
    }
}
