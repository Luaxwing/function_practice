<?php
 function sum($a, $b){
    $sum=$a+$b;
    echo "輸入".$a."、".$b;
    echo "<br>";
    return $sum;
}


$sum=sum(10,20);
echo "總和是".$sum;
echo "<hr>";

echo "總和是:".sum(55,66);

echo "<hr>";


function sum2(...$arg){
    print_r($arg);
    echo "<br>";
    return array_sum($arg);
}

function sum3(...$arg){
    $sum=0;
    foreach($arg as $num){
        $sum+=$num;
    }
    print_r($arg);
    echo "<br>";
    return array_sum($arg);
}

function sum_many($v1=1,$num=100){
echo "起始值為:".$v1;
echo "<br>";
echo "終點值為:".$num;
echo "<br>";

// $item=0;
$item=$num-$v1+1;

    for($i=$v1;$i<=$num;$i++){
        $val[]=$i;
        // $item+=1;
    }

    echo "項數為:".$item;
    echo "<br>";
    
    $result_1_100 =  array_sum($val);
    return $result_1_100;
    
}

// ...$arg 解構賦值


$result = sum2(1, 2, 3, 4, 5);
echo $result; // 將會輸出 15

echo "<br>";


// for($i=1;$i<=100;$i++){
//     $val[]=$i;
// }

// $result_1_100 = sum2( array_sum($val) );
// echo $result_1_100; 
echo"總和為:".sum_many(1,100);


?>
<br>
<br>
<?php
function makecoffee($types = array("cappuccino"), $coffeeMaker = NULL)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";
}
echo makecoffee();
echo "<br>";
echo makecoffee(array("cappuccino", "lavazza"), "teapot");?>