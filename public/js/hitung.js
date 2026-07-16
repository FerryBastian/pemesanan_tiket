function formatRupiah(angka) {
    return 'Rp ' + angka.toLocaleString('id-ID');
}

function parseJumlah(nilai) {
    var angka = parseInt(nilai, 10);

    if (isNaN(angka) || angka < 0) {
        return 0;
    }

    return angka;
}

document.addEventListener('DOMContentLoaded', function () {
    var wisataSelect = document.getElementById('wisata_id');
    var hargaInput = document.getElementById('harga_tiket');
    var dewasaInput = document.getElementById('jumlah_dewasa');
    var anakInput = document.getElementById('jumlah_anak');
    var totalInput = document.getElementById('total_bayar');
    var tombolHitung = document.getElementById('btn-hitung');

    function updateHarga() {
        var selected = wisataSelect.options[wisataSelect.selectedIndex];
        var harga = parseInt(selected.getAttribute('data-harga'), 10) || 0;
        hargaInput.value = harga > 0 ? formatRupiah(harga) : '';
        totalInput.value = '';
    }

    function hitungTotal() {
        var selected = wisataSelect.options[wisataSelect.selectedIndex];
        var harga = parseInt(selected.getAttribute('data-harga'), 10) || 0;
        var jumlahDewasa = parseJumlah(dewasaInput.value);
        var jumlahAnak = parseJumlah(anakInput.value);
        var total = (jumlahDewasa * harga) + (jumlahAnak * harga * 0.5);

        totalInput.value = formatRupiah(total);
    }

    if (wisataSelect && hargaInput && dewasaInput && anakInput && totalInput && tombolHitung) {
        wisataSelect.addEventListener('change', updateHarga);
        tombolHitung.addEventListener('click', hitungTotal);
        updateHarga();
    }
});
