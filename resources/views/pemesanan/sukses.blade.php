@extends('layouts.app')

@section('content')
    <section class="receipt">
        <h1>Pemesanan Berhasil</h1>
        <p>Berikut ringkasan pemesanan tiket wisata Anda.</p>

        <div class="receipt-row">
            <strong>Nama Pemesan</strong>
            <span>{{ $pemesanan->nama_pemesan }}</span>
        </div>
        <div class="receipt-row">
            <strong>Nomor Identitas</strong>
            <span>{{ $pemesanan->nomor_identitas }}</span>
        </div>
        <div class="receipt-row">
            <strong>No. HP</strong>
            <span>{{ $pemesanan->no_hp }}</span>
        </div>
        <div class="receipt-row">
            <strong>Tempat Wisata</strong>
            <span>{{ $pemesanan->wisata->nama }}</span>
        </div>
        <div class="receipt-row">
            <strong>Tanggal Kunjungan</strong>
            <span>{{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d/m/Y') }}</span>
        </div>
        <div class="receipt-row">
            <strong>Pengunjung Dewasa</strong>
            <span>{{ $pemesanan->jumlah_dewasa }} orang</span>
        </div>
        <div class="receipt-row">
            <strong>Pengunjung Anak-Anak</strong>
            <span>{{ $pemesanan->jumlah_anak }} orang</span>
        </div>
        <div class="receipt-row">
            <strong>Harga Tiket</strong>
            <span>Rp {{ number_format($pemesanan->wisata->harga_tiket, 0, ',', '.') }}</span>
        </div>
        <div class="receipt-row">
            <strong>Total Bayar</strong>
            <span><strong>Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</strong></span>
        </div>

        <div class="actions">
            <a class="btn" href="{{ route('wisata.index') }}">Kembali ke Beranda</a>
            <a class="btn secondary" href="{{ route('pemesanan.create') }}">Pesan Lagi</a>
        </div>
    </section>
@endsection
