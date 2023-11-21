<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Http::get('http://127.0.0.1:8001/api/getPhoto');
        $data['galleries'] = $photos->json();

        return view('gallery.index')->with($data);
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);

        $response = Http::post('http://127.0.0.1:8001/api/postPhoto', [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $request->file('picture')
        ]);

        $responseData = $response->json();
        if ($responseData) {
            return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
        } else {
            return redirect('gallery')->with('error', 'Gagal menambah data');
        }
    }

    public function edit(string $id)
    {
        $gambar = Post::find($id);

        return view('gallery.edit')->with('gambar', $gambar);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->input();
        $gambar = Post::find($id);
        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
            Storage::delete(public_path() . '/storage/posts_image/' . $gambar->picture);
        } else {
            $filenameSimpan = $gambar->picture;
        }
        $gambar->title = $data['title'];
        $gambar->description = $data['description'];
        $gambar->picture = $filenameSimpan;
        $gambar->save();

        return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
    }

    public function delete($id)
    {
        $gambar = Post::find($id);
        Storage::delete(public_path() . '/storage/posts_image/' . $gambar->picture);
        $gambar->delete();
        return redirect('gallery')->with('success', 'Berhasil menghapus data');
    }

    public function details()
    {
        $data = Post::all();

        return view('gallery.detail')->with('data', $data);
    }
}
