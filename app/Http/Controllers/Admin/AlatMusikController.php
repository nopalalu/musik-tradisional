<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlatMusik;
use Illuminate\Http\Request;

class AlatMusikController extends Controller
{
    public function index()
    {
        $alat = AlatMusik::with('pulau')->paginate(10);

        return view('admin.alat.index', compact('alat'));
    }

    public function destroy($id)
    {
        $alat = AlatMusik::findOrFail($id);
        $alat->delete();

        return redirect('/admin/alat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pulau_id' => 'required',
            'kategori' => 'required',
            'sumber_bunyi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
            'audio' => 'nullable|mimes:mp3'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('img', 'public');
        }

        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('audio', 'public');
        }

        AlatMusik::create($data);

        return redirect('/admin/alat');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'pulau_id' => 'required',
            'kategori' => 'required',
            'sumber_bunyi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
            'audio' => 'nullable|mimes:mp3'
        ]);

        $alat = AlatMusik::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('img', 'public');
        }

        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('audio', 'public');
        }

        $alat->update($data);

        return redirect('/admin/alat');
    }

    public function edit($id)
    {
        $alat = AlatMusik::findOrFail($id);
        $pulau = \App\Models\Pulau::all();
        return view('admin.alat.edit', compact('alat', 'pulau'));
    }
}
