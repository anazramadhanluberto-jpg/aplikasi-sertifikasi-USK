<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peserta;
use App\Models\Skema;

class UserDashboardController extends Controller
{
    // Menampilkan Dashboard Peserta (Menampilkan data diri & skema pilihan)
    public function index()
    {
        $peserta = Peserta::with('skema')->where('user_id', Auth::id())->first();

        // Jika peserta belum mengisi data diri, arahkan ke form pengisian profil
        if (!$peserta) {
            return redirect()->route('user.complete-profile');
        }

        return view('users.dashboard', compact('peserta'));
    }

    public function createProfile()
    {
        $skemas = Skema::all();
        return view('users.complete-profile', compact('skemas'));
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16|unique:pesertas',
            'nama_peserta' => 'required|string|max:255',
            'skema_id' => 'required|exists:skemas,id',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        Peserta::create([
            'user_id' => Auth::id(),
            'skema_id' => $request->skema_id,
            'nik' => $request->nik,
            'nama_peserta' => $request->nama_peserta,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'status_rekomendasi' => 'Terdaftar',
        ]);

        return redirect()->route('users.dashboard');
    }

    public function editProfile()
    {
        $peserta = Peserta::where('user_id', Auth::id())->firstOrFail();
        $skemas = Skema::all();
        return view('users.edit-profile', compact('peserta', 'skemas'));
    }

    public function updateProfile(Request $request)
    {
        $peserta = Peserta::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'nik' => 'required|string|max:16|unique:pesertas,nik,' . $peserta->id,
            'nama_peserta' => 'required|string|max:255',
            'skema_id' => 'required|exists:skemas,id',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        $peserta->update([
            'skema_id' => $request->skema_id,
            'nik' => $request->nik,
            'nama_peserta' => $request->nama_peserta,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('users.dashboard')->with('success', 'Data diri berhasil diperbarui!');
    }
}
