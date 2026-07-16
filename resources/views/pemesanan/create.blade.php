@extends('layouts.app')

@section('content')
    <section class="hero">
        <h1>Form Pemesanan Tiket</h1>
        <p>Isi data pemesan, klik Hitung Total Bayar, lalu kirim pemesanan.</p>
    </section>

    @if ($errors->any())
        <div class="errors">
            <strong>Data belum valid:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-card" method="POST" action="{{ route('pemesanan.store') }}" id="form-pemesanan">
        @csrf
        <div class="form-grid">
            <div>
                <label for="nama_pemesan">Nama Lengkap</label>
                <input id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}" required>
            </div>

            <div>
                <label for="nomor_identitas">Nomor Identitas</label>
                <input id="nomor_identitas" name="nomor_identitas" value="{{ old('nomor_identitas') }}" maxlength="16"
                    required>
            </div>

            <div>
                <label for="no_hp">No. HP</label>
                <input id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
            </div>

            <div>
                <label for="wisata_id">Tempat Wisata</label>
                <select id="wisata_id" name="wisata_id" required>
                    <option value="" data-harga="0">Pilih tempat wisata</option>
                    @foreach ($wisatas as $wisata)
                        <option value="{{ $wisata->id }}" data-harga="{{ $wisata->harga_tiket }}"
                            @selected(old('wisata_id') == $wisata->id)>
                            {{ $wisata->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                <input type="text" id="tanggal_kunjungan" name="tanggal_kunjungan" placeholder="dd/mm/yyyy"
                    value="{{ old('tanggal_kunjungan') }}" autocomplete="off" required>
            </div>

            <div>
                <label for="jumlah_dewasa">Pengunjung Dewasa</label>
                <input id="jumlah_dewasa" name="jumlah_dewasa" type="number" min="0" value="{{ old('jumlah_dewasa', 0) }}"
                    required>
            </div>

            <div>
                <label for="jumlah_anak">Pengunjung Anak-Anak</label>
                <input id="jumlah_anak" name="jumlah_anak" type="number" min="0" value="{{ old('jumlah_anak', 0) }}"
                    required>
            </div>

            <div>
                <label for="harga_tiket">Harga Tiket</label>
                <input id="harga_tiket" name="harga_tiket" value="{{ old('harga_tiket') }}" readonly>
            </div>

            <div class="full">
                <label for="total_bayar">Total Bayar</label>
                <input id="total_bayar" name="total_bayar" value="{{ old('total_bayar') }}" readonly>
            </div>

            <div class="full">
                <label class="check">
                    <input type="checkbox" name="setuju" value="1" @checked(old('setuju'))>
                    Saya sudah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan.
                </label>
            </div>
        </div>

        <div class="actions">
            <button class="btn secondary" type="button" id="btn-hitung">Hitung Total Bayar</button>
            <button class="btn" type="submit">Pesan Tiket</button>
            <button class="btn cancel" type="button" id="btn-cancel">Cancel</button>
        </div>
    </form>

    {{-- Flatpickr untuk date picker (format dd/mm/yyyy) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
    <script>
        flatpickr("#tanggal_kunjungan", {
            dateFormat: "d/m/Y",
            allowInput: true,
            minDate: "today",
        });

        document.getElementById('btn-cancel').addEventListener('click', function () {
            document.getElementById('form-pemesanan').reset();
            document.getElementById('harga_tiket').value = '';
            document.getElementById('total_bayar').value = '';
        });
    </script>

    <script src="{{ asset('js/hitung.js') }}"></script>
@endsection