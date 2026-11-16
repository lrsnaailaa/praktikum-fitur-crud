<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Post::with('buku')
            ->latest()
            ->paginate(30);

        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bukus = Buku::orderBy('judul')->get();

        return view('gallery.create', compact('bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'buku_id',
            'title',
            'description'
        ]);

        $data['picture'] = $request->file('picture')
            ->store('posts_image', 'public');

        Post::create($data);

        return redirect()->route('gallery.index')
            ->with('pesan', 'Gambar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Post::findOrFail($id);
        $bukus = Buku::orderBy('judul')->get();

        return view('gallery.edit', compact('gallery', 'bukus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gallery = Post::findOrFail($id);

        $data = $request->only([
            'buku_id',
            'title',
            'description'
        ]);

        if ($request->hasFile('picture')) {
            Storage::disk('public')->delete($gallery->picture);

            $data['picture'] = $request->file('picture')
                ->store('posts_image', 'public');
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')
            ->with('pesan', 'Data gambar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Post::findOrFail($id);

        Storage::disk('public')->delete($gallery->picture);

        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('pesan', 'Data gambar berhasil dihapus.');
    }
}
