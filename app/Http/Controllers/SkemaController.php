<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::oldest()->get();
        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_skema' => 'required|unique:skemas,kd_skema',
            'nm_skema' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah_unit' => 'required|integer|min:1',
        ]);

        Skema::create($request->all());
        return redirect()->route('skema.index')->with('success', 'Skema berhasil ditambahkan.');
    }

    public function show($id)
    {
        $skema = Skema::with('pesertas')->findOrFail($id);

        return view('skema.show', compact('skema'));
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $request->validate([
            'kd_skema' => 'required|unique:skemas,kd_skema,' . $skema->id,
            'nm_skema' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah_unit' => 'required|integer|min:1',
        ]);

        $skema->update($request->all());
        return redirect()->route('skema.index')->with('success', 'Skema berhasil diperbarui.');
    }

    public function destroy(Skema $skema)
    {
        $skema->delete();
        return redirect()->route('skema.index')->with('success', 'Skema berhasil dihapus.');
    }
}
