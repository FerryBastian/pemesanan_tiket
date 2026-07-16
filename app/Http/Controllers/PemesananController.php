<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Wisata;
use DateTime;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function create()
    {
        $wisatas = Wisata::orderBy('nama')->get();

        return view('pemesanan.create', compact('wisatas'));
    }

    public function store(Request $request)
    {
        $errors = [];

        $namaPemesan = trim((string) $request->input('nama_pemesan'));
        $nomorIdentitas = trim((string) $request->input('nomor_identitas'));
        $noHp = trim((string) $request->input('no_hp'));
        $wisataId = (int) $request->input('wisata_id');
        $tanggalInput = trim((string) $request->input('tanggal_kunjungan'));
        $jumlahDewasa = (int) $request->input('jumlah_dewasa', 0);
        $jumlahAnak = (int) $request->input('jumlah_anak', 0);

        if ($namaPemesan === '') {
            $errors['nama_pemesan'] = 'Nama lengkap wajib diisi.';
        }

        if (strlen($nomorIdentitas) !== 16 || ! ctype_digit($nomorIdentitas)) {
            $errors['nomor_identitas'] = 'Nomor identitas harus 16 digit angka.';
        }

        if ($noHp === '') {
            $errors['no_hp'] = 'No. HP wajib diisi.';
        }

        $wisata = Wisata::find($wisataId);
        if (! $wisata) {
            $errors['wisata_id'] = 'Tempat wisata tidak valid.';
        }

        $tanggalKunjungan = DateTime::createFromFormat('d/m/Y', $tanggalInput);
        $tanggalValid = $tanggalKunjungan && $tanggalKunjungan->format('d/m/Y') === $tanggalInput;
        if (! $tanggalValid) {
            $errors['tanggal_kunjungan'] = 'Tanggal kunjungan harus berformat dd/mm/yyyy.';
        }

        if (! is_numeric($request->input('jumlah_dewasa')) || $jumlahDewasa < 0) {
            $errors['jumlah_dewasa'] = 'Jumlah pengunjung dewasa harus angka minimal 0.';
        }

        if (! is_numeric($request->input('jumlah_anak')) || $jumlahAnak < 0) {
            $errors['jumlah_anak'] = 'Jumlah pengunjung anak-anak harus angka minimal 0.';
        }

        if ($jumlahDewasa + $jumlahAnak < 1) {
            $errors['jumlah_pengunjung'] = 'Minimal harus ada 1 pengunjung.';
        }

        if (! $request->boolean('setuju')) {
            $errors['setuju'] = 'Syarat dan ketentuan harus disetujui.';
        }

        if (count($errors) > 0) {
            return back()->withErrors($errors)->withInput();
        }

        $totalBayar = hitungTotalBayar($wisata->harga_tiket, $jumlahDewasa, $jumlahAnak);

        $pemesanan = Pemesanan::create([
            'nama_pemesan' => $namaPemesan,
            'nomor_identitas' => $nomorIdentitas,
            'no_hp' => $noHp,
            'wisata_id' => $wisata->id,
            'tanggal_kunjungan' => $tanggalKunjungan->format('Y-m-d'),
            'jumlah_dewasa' => $jumlahDewasa,
            'jumlah_anak' => $jumlahAnak,
            'total_bayar' => $totalBayar,
        ]);

        return redirect()->route('pemesanan.sukses', $pemesanan);
    }

    public function sukses(Pemesanan $pemesanan)
    {
        $pemesanan->load('wisata');

        return view('pemesanan.sukses', compact('pemesanan'));
    }
}
