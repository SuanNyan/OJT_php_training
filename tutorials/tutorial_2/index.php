<?php
echo "<pre>";
for ($i = 1; $i < 6; $i++) {
    for ($j = $i; $j < 8; $j++) {
        echo "  ";
    }
    for ($j = 2 * $i - 1; $j > 0; $j--) {
        echo(" *");
    }
    echo "<br>";
}
$k = 8;
for ($l = 6; $l > 0; $l--) {
    for ($m = $k - $l; $m > 0; $m--) {
        echo "  ";
    }
    for ($m = 2 * $l - 1; $m > 0; $m--) {
        echo(" *");
    }
    echo "<br>";
}
echo "</pre>";
?>
