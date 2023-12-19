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
        $data = Post::all();

        return view('gallery.index')->with('galleries', $data);
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

        $image = $request->only([
            'title',
            'description',
            'picture'
        ]);

        if (empty($image['title']) && empty($image['description']) && empty($image['picture'])) {
            return new \Exception('Data belum lengkap', 400);
        }

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
        } else {
            $filenameSimpan = 'noimage.png';
        }

        $post = new Post;
        $post->picture = $filenameSimpan;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
        
        return redirect()->route('gallery.index');
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
