<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $beritas = Berita::query()
            ->when($request->kata_kunci, function ($q, $kata) {
                $q->where('judul', 'like', "%{$kata}%");
            })
            ->when($request->kategori, function ($q, $kategori) {
                $q->where('kategori', $kategori);
            })
            ->latest()
            ->paginate(3)
            ->withQueryString();

        return view('berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'    => 'required|max:255',
            'kategori' => 'required',
            'isi'      => 'required|min:10',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita_images', 'public');
        }

        Berita::create($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

public function show(Berita $berita)
    {
        $berita->increment('dilihat');
        $beritaLain = Berita::where('id', '!=', $berita->id)
                            ->latest()
                            ->take(4)
                            ->get();

        return view('berita.show', compact('berita', 'beritaLain'));
    }

    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'judul'    => 'required|max:255',
            'kategori' => 'required',
            'isi'      => 'required|min:10',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && !filter_var($berita->gambar, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita_images', 'public');
        }

        $berita->update($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && !filter_var($berita->gambar, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($berita->gambar);
        }
        
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}