
<form action="func_star.php" method="get">
    <input type="text" name="number" id="" style="width=5px;">
    <input type="submit" value="提交">
    <input type="reset" value="重置" onclick="location.href='func_star.php'">
</form>


<br>
<?php

if(isset($_GET['number']) && is_numeric($_GET['number'])){
    $n=$_GET['number'];
    echo"輸入:".$n;
}else{
// --------------------------------------------------------------
$n=5;
echo"輸入:".$n;
// --------------------------------------------------------------
}
br();
echo "<hr>";
br();
echo "Star";
br_(2);
// 正直角
printStar($n);

br_(2);
echo "StarInv";
br_(2);
// 倒直角
printStarInv($n);

br_(2);
echo "StarInvSIDE";
br_(2);
// 反倒直角
printStarINVSIDE($n);

br_(2);
echo "StarInvAside";
br_(2);
// 反直角
printStarINVAside($n);

br_(2);
echo "printequTri";
br_(2);
// 立三角
printequTri($n);

br_(2);
echo "printINVequTri";
br_(2);
// 倒立三角
printINVequTri($n);

br_(2);


?>


<h2>菱形</h2>
<?php
club($n);

?>









<h2>矩形</h2>

<?php
echo"mysquare";
br_(2);
mysquare($n);
br_(2);
echo"square";
br_(2);
square($n);
br_(2);
echo"square_diagonal";
br_(2);
square_diagonal($n);


br_(10);



?>



<?php

function printStar($n){
    for($b=1;$b<=$n;$b++){
        for($a=0;$a<$b;$a++){
            echo "*";
        }
        // if($b < $n){
        //     br_($br);
        // }
        br();
    }

}

function printStarInv($n){
    for($b=1;$b<=$n;$b++){
        for($a=$n;$a>=$b;$a--){
            echo "*";
        }
        // if($b < $n){
        //     br_($br);
        // }
        br();
    }

}

function printStarINVSIDE($n){
    for($b=1;$b<=$n;$b++){
        for($a=0;$a<$b;$a++){
            space();
        }
        for($c=$n;$c>=$a;$c--){
            echo "*";
        }
        // if($b < $n){
        //     br_($br);
        // }
        br();
    }

}

function printStarINVAside($n){
    for($b=1;$b<=$n;$b++){
        for($a=$n;$a>=$b;$a--){
            space();
        }
        for($a=0;$a<$b;$a++){
            echo "*";
        }
        // if($b < $n){
        //     br_($br);
        // }
        br();
        }
        
}



// 正三角形
function printequTri($n){

    for($a=0;$a<$n;$a++){
        echo $a;
        for($b=$n;$b>$a;$b--){
            space();
            // space();
            // echo"{".$b."}";
        }
        for($c=0;$c<((2*$a)-1);$c++){
            echo "*";
            // echo"[".$c."]";
        }
        br();
    }

}

// 倒三角形
function printINVequTri($n){
    for($b=0;$b<$n;$b++){
        $j=0;
        // --
        echo $b;
        space();
        for($a=0;$a<$b;$a++){
            // space();
            // space();
            // echo"&nbsp;";
            echo"{".$a."}";
        }
        for($c=2*$n-1;$c>2*$a;$c--){
            // echo"*";
            echo"[".$j."]";
            $j+=1;
        }
        br();

    }

}





function club($n){
    for($i=0;$i<((2*$n)-1);$i++){
        if($i<=floor(((2*$n)-1))/2){
            $tmp=$i;
        }else{
            $tmp--;
        }
    
        for($j=0;$j<((floor((2*$n)-1)/2)-$tmp);$j++){
            space();
        }
        for($k=0;$k<($tmp*2+1);$k++){
            echo "*";
        }
        echo "<br>";
    }
}

?>












<?php






function mysquare($n){
for($i=0;$i<$n;$i++){
    for($j=0;$j<$n;$j++){
        if($i != 0 && $i !=$n-1){
            if($j != 0 && $j !=$n-1){
                space();
            }else{
                echo"*";
            }
        }else{
            echo"*";

        }
       
    }
    br();
}
}


// ---------------------------------------
function square($n){
// for($i=0;$i<$n;$i++){

//     for($j=0;$j<$n;$j++){
//         if($i==0 || $i==($n-1)){
//             echo "*";
//         }elseif($j==0 || $j==($n-1)){
//             echo"*";
//         }else{
//             space();

//         }
//     }
//     br();
// }
// ---------------------------------------
for($i=0;$i<$n;$i++){

    for($j=0;$j<$n;$j++){
        if($i==0 || $i==($n-1)){
            echo "*";
        }elseif($j==0 || $j==($n-1) || $j==$i || ($j+$i)==($n-1)){
            echo"*";
        }else{
            echo "&nbsp;&nbsp;";

        }
    }
    br();
}
}


// ---------------------------------------
function square_diagonal($n){
for($i=0;$i<$n;$i++){

    for($j=0;$j<$n;$j++){
        if($i==0 || $i==($n-1)){
            echo "*";
        }elseif($j==0 || $j==($n-1) ){
            echo"*";
        }elseif( $j==$i || ($j+$i)==($n-1)){
            echo"<span style=color:red>";
            echo"*";
            echo"</span>";
        }else{
            echo "&nbsp;&nbsp;";

        }
        
    }
    br();
}
}















// 換行@@
function br(){
    echo "<br>";
}

function br_($n){
    for($i=0;$i<$n;$i++){
        echo "<br>";
    }
    
}

function space(){
    echo"&nbsp;&nbsp;";
}
?>