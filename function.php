<?php function sum($a, $b){
    $sum=$a+$b;
    echo "輸入".$a."、".$b;
    echo "<br>";
    return $sum;
}


$sum=sum(10,20);
echo "總和是".$sum;
echo "<hr>";

echo "總和是:".sum(55,66);