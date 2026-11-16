<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);

        return view(
            'buku.index',
            compact('data_buku', 'no', 'jumlah_buku')
        );
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;

        $data_buku = Buku::where('judul', 'like', '%' . $cari . '%')
            ->orWhere('penulis', 'like', '%' . $cari . '%')
            ->orderBy('id', 'desc')
            ->paginate($batas)
            ->appends(['kata' => $cari]);

        $jumlah_buku = $data_buku->total();
        $no = $batas * ($data_buku->currentPage() - 1);

        return view(
            'buku.search',
            compact('jumlah_buku', 'data_buku', 'no', 'cari')
        );
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'jenis_buku' => 'required|in:Fiksi,Non-Fiksi',
            'harga' => 'required|numeric|min:0',
            'tgl_terbit' => 'required|date',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.string' => 'Judul buku harus berupa teks.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'penulis.string' => 'Nama penulis harus berupa teks.',
            'jenis_buku.required' => 'Jenis buku wajib dipilih.',
            'jenis_buku.in' => 'Jenis buku harus Fiksi atau Non-Fiksi.',
            'harga.required' => 'Harga buku wajib diisi.',
            'harga.numeric' => 'Harga buku harus berupa angka.',
            'tgl_terbit.required' => 'Tanggal terbit wajib diisi.',
            'tgl_terbit.date' => 'Tanggal terbit harus berupa tanggal yang valid.',
            'cover.image' => 'Cover harus berupa file gambar.',
            'cover.mimes' => 'Cover harus berformat JPG, JPEG, atau PNG.',
            'cover.max' => 'Ukuran cover maksimal 2 MB.',
        ]);

        $data = $request->only([
            'judul',
            'penulis',
            'jenis_buku',
            'harga',
            'tgl_terbit'
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Buku::create($data);

        return redirect('/buku')->with(
            'pesan',
            'Data Buku Berhasil di Simpan'
        );
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'jenis_buku' => 'required|in:Fiksi,Non-Fiksi',
            'harga' => 'required|numeric|min:0',
            'tgl_terbit' => 'required|date',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.string' => 'Judul buku harus berupa teks.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'penulis.string' => 'Nama penulis harus berupa teks.',
            'jenis_buku.required' => 'Jenis buku wajib dipilih.',
            'jenis_buku.in' => 'Jenis buku harus Fiksi atau Non-Fiksi.',
            'harga.required' => 'Harga buku wajib diisi.',
            'harga.numeric' => 'Harga buku harus berupa angka.',
            'tgl_terbit.required' => 'Tanggal terbit wajib diisi.',
            'tgl_terbit.date' => 'Tanggal terbit harus berupa tanggal yang valid.',
            'cover.image' => 'Cover harus berupa file gambar.',
            'cover.mimes' => 'Cover harus berformat JPG, JPEG, atau PNG.',
            'cover.max' => 'Ukuran cover maksimal 2 MB.',
        ]);

        $buku = Buku::findOrFail($id);

        $data = $request->only([
            'judul',
            'penulis',
            'jenis_buku',
            'harga',
            'tgl_terbit'
        ]);

        if ($request->hasFile('cover')) {

            if ($buku->cover) {
                Storage::disk('public')->delete($buku->cover);
            }

            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $buku->update($data);

        return redirect('/buku')->with(
            'pesan',
            'Data Buku Berhasil di Update'
        );
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect('/buku')->with(
            'pesan',
            'Data Buku Berhasil di Hapus'
        );
    }
}
