<?php
function hitungNilaiAkhir($uts, $uas, $tugas) {
    // Menghitung berdasarkan persentase bobot (30%, 40%, 30%)
    $nilaiAkhir = ($uts * 0.30) + ($uas * 0.40) + ($tugas * 0.30);
    return (float)$nilaiAkhir;
}

// Contoh Pemanggilan
echo "Total Nilai Akhir: " . hitungNilaiAkhir(80, 85, 90);
?>