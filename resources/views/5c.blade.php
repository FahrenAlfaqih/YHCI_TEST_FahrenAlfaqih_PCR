<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        //validasi terlebih dahulu data yang diterima dari HTTP
        $request->validate([
            'judul_postingan' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        try {
            // Simpan data baru ke dalam tabel posts
            $post = new Post();
            $post->judul_postingan = $request->input('judul_postingan');
            $post->konten = $request->input('konten');
            $post->save();

            //jika berhasil redirect ke route posts.index dengan pesan sukses
            return redirect()->route('posts.index')->with('success', 'Post berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Terjadi kesalahan saat menyimpan post');
        }
    }
}

