<?php
$n = 10;
$a = 0; // Suku pertama
$b = 1; // Suku kedua

echo "Deret Fibonacci hingga 10 suku: \n";
for ($i = 0; $i < $n; $i++) {
    echo $a . " ";
    $c = $a + $b; // Menghitung suku berikutnya
    $a = $b;      // Menggeser nilai
    $b = $c;
}
?>