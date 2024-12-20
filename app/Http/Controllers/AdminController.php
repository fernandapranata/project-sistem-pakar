<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Solusi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $gejalasCount = Gejala::count();
        $kerusakansCount = Kerusakan::count();
        $solusisCount = Solusi::count();
    
        return view('admin.dashboard', compact('gejalasCount', 'kerusakansCount', 'solusisCount'));
    }

    // GEJALA
    public function gejalaIndex()
    {
        $gejalas = Gejala::all();
        return view('admin.gejala.index', compact('gejalas'));
    }

    public function gejalaStore(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:255|unique:gejalas,kode_gejala',
            'nama_gejala' => 'required|string|max:255',
        ]);

        Gejala::create($request->only('kode_gejala', 'nama_gejala'));

        return redirect()->back()->with('success', 'Gejala berhasil ditambahkan');
    }

    public function gejalaEdit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('admin.gejala.edit', compact('gejala'));
    }

    public function gejalaUpdate(Request $request, $id)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:255|unique:gejalas,kode_gejala,' . $id,
            'nama_gejala' => 'required|string|max:255',
        ]);

        $gejala = Gejala::findOrFail($id);
        $gejala->update($request->only('kode_gejala', 'nama_gejala'));

        return redirect()->route('admin.gejala')->with('success', 'Gejala berhasil diperbarui');
    }

    public function gejalaDestroy($id)
    {
        $gejala = Gejala::findOrFail($id); // Pastikan data ditemukan
        $gejala->delete(); // Menghapus data
        return redirect()->back()->with('success', 'Gejala berhasil dihapus');
    }
    

    // KERUSAKAN
    public function kerusakanIndex()
    {
        $kerusakans = Kerusakan::all();
        $gejalas = Gejala::all();
        return view('admin.kerusakan.index', compact('kerusakans', 'gejalas'));
    }

    public function kerusakanStore(Request $request)
    {
        $request->validate([
            'kode_kerusakan' => 'required|string|max:255|unique:kerusakans,kode_kerusakan',
            'nama_kerusakan' => 'required|string|max:255',
            'gejala' => 'required|array',
            'gejala.*' => 'exists:gejalas,id',
        ]);

        $kerusakan = Kerusakan::create($request->only('kode_kerusakan', 'nama_kerusakan'));
        $kerusakan->gejalas()->attach($request->gejala);

        return redirect()->back()->with('success', 'Kerusakan berhasil ditambahkan');
    }

    public function kerusakanEdit($id)
    {
        $kerusakan = Kerusakan::findOrFail($id);
        $gejalas = Gejala::all();
        return view('admin.kerusakan.edit', compact('kerusakan', 'gejalas'));
    }

    public function kerusakanUpdate(Request $request, $id)
    {
        $request->validate([
            'kode_kerusakan' => 'required|string|max:255|unique:kerusakans,kode_kerusakan,' . $id,
            'nama_kerusakan' => 'required|string|max:255',
            'gejala' => 'required|array',
            'gejala.*' => 'exists:gejalas,id',
        ]);

        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->update($request->only('kode_kerusakan', 'nama_kerusakan'));
        $kerusakan->gejalas()->sync($request->gejala);

        return redirect()->route('admin.kerusakan')->with('success', 'Kerusakan berhasil diperbarui');
    }

    public function kerusakanDestroy($id)
    {
        $kerusakan = Kerusakan::findOrFail($id); // Pastikan data ditemukan
        $kerusakan->delete(); // Menghapus data
        return redirect()->back()->with('success', 'Kerusakan berhasil dihapus');
    }
    

    // SOLUSI
    public function solusiIndex()
    {
        $solusis = Solusi::with('kerusakan')->get();
        $kerusakans = Kerusakan::all();
        return view('admin.solusi.index', compact('solusis', 'kerusakans'));
    }

    public function solusiStore(Request $request)
    {
        $request->validate([
            'kode_solusi' => 'required|string|max:255|unique:solusis,kode_solusi',
            'kerusakan_id' => 'required|exists:kerusakans,id',
            'solusi' => 'required|string|max:255',
        ]);

        Solusi::create($request->only('kode_solusi', 'kerusakan_id', 'solusi'));

        return redirect()->back()->with('success', 'Solusi berhasil ditambahkan');
    }

    public function solusiEdit($id)
    {
        $solusi = Solusi::findOrFail($id);
        $kerusakans = Kerusakan::all();
        return view('admin.solusi.edit', compact('solusi', 'kerusakans'));
    }

    public function solusiUpdate(Request $request, $id)
    {
        $request->validate([
            'kode_solusi' => 'required|string|max:255|unique:solusis,kode_solusi,' . $id,
            'kerusakan_id' => 'required|exists:kerusakans,id',
            'solusi' => 'required|string|max:255',
        ]);

        $solusi = Solusi::findOrFail($id);
        $solusi->update($request->only('kode_solusi', 'kerusakan_id', 'solusi'));

        return redirect()->route('admin.solusi')->with('success', 'Solusi berhasil diperbarui');
    }

    public function solusiDestroy($id)
    {
        $solusi = Solusi::findOrFail($id); // Pastikan data ditemukan
        $solusi->delete(); // Menghapus data
        return redirect()->back()->with('success', 'Solusi berhasil dihapus');
    }    
}