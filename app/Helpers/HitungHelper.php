<?php

if (! function_exists('hitungTotalBayar')) {
    function hitungTotalBayar(int|float $hargaTiket, int $jumlahDewasa, int $jumlahAnak): int
    {
        if ($hargaTiket < 0 || $jumlahDewasa < 0 || $jumlahAnak < 0) {
            return 0;
        }

        $totalDewasa = $hargaTiket * $jumlahDewasa;
        $totalAnak = ($hargaTiket * 0.5) * $jumlahAnak;

        return (int) ($totalDewasa + $totalAnak);
    }
}
