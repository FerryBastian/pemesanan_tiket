@extends('layouts.app')

@section('content')
    <section class="hero">
        <h1>Daftar Tempat Wisata</h1>
        <p>Pilih destinasi wisata, cek harga tiket, lalu lakukan pemesanan melalui form publik tanpa login.</p>
        <div class="actions">
            <a class="btn" href="{{ route('pemesanan.create') }}">Pesan Tiket</a>
        </div>
    </section>

    <section>
        <h2>Tempat Wisata</h2>
        <div class="grid">
            @foreach ($wisatas as $wisata)
                <article class="card">
                    <img src="{{ $wisata->foto }}" alt="Foto {{ $wisata->nama }}">

                    <div class="card-body">
                        <h3>{{ $wisata->nama }}</h3>
                        <p>{{ $wisata->deskripsi }}</p>
                        <p class="price">Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</p>

                        @php
                            $embedUrl = getYoutubeEmbedUrl($wisata->video_url);
                        @endphp

                        @if ($embedUrl)
                            <div class="video-wrapper">
                                <iframe
                                    src="{{ $embedUrl }}"
                                    title="Video profil {{ $wisata->nama }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    loading="lazy">
                                </iframe>
                            </div>
                        @else
                            <p class="video-empty">Video profil belum tersedia.</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section style="margin-top: 30px;">
        <h2>Tabel Harga Tiket</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tempat Wisata</th>
                    <th>Harga Dewasa</th>
                    <th>Harga Anak-Anak (&lt; 12 Tahun)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wisatas as $wisata)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $wisata->nama }}</td>
                        <td>Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($wisata->harga_tiket * 0.5, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection