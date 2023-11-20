<?php
// $rows=all();
// $rows = all_A(SQL:"localhost", DB:"school", TB:"students",where:"`id`<= 10");
// $rows=find("students",['dept'=>'1','graduate_at'=>'23']);
// dd($rows);
$sql=insert("dept","[`id`=>'2']");



// function all(){
//     $dsn="mysql:host=localhost;charset=utf8;dbname=school";
//     $pdo=new PDO($dsn,'root','');

//     $sql="select * from `students`";
//     $rows=$pdo->query($sql)->fetchAll();
//     return $rows;
// }

// ChatGPT寫的:PDO錯誤
function all_A($SQL = "localhost", $DB = null, $TB = null, $where = '')
{
    // try {
    if (isset($SQL) && !empty($SQL)) {
        if (isset($DB) && !empty($DB)) {

            $dsn = "mysql:host=$SQL;charset=utf8;dbname=$DB";
            $pdo = new PDO($dsn, 'root', '');

            if (isset($TB) && !empty($TB)) {

                    // $sql = "select * from `table` where `col1`= '' && `col2` = '' && ...";
                    // ==>
                        // #1
                        // $sql="where".join('&&',$array);

                    // ----------------------------------------------------------------------

                    // ==>

                         // #2
                         // $array=["`col1`= 'value1'","`col2`= 'value2'","`col3`= 'value3'",...]

                             //==> 

                             //#3  
                             // $array[]=`col1`= 'value1'";
                             // $array[]=`col2`= 'value2'";
                             // $array[]=`col3`= 'value3'";
                             // $array[]=...

                                //==>
                                
                                //#4
                                //foreach($array as $col=>$value){
                                // $tmp[]=" `   ` "=" '   ' ";
                                // }
                                
                                // -----------------------

                             //-----------------------------------

                         // ----------------------------------------------------------------------
                    
                    // -----------------------------------------------------------------------------
                $sel = "select * from `$TB` ";
                if (is_array($where)) {

                    if (!empty($where)) {
                        foreach ($where as $col => $value) {
                            $tmp[] = " `$col` = '$value' ";
                        }

                        // $sql = "select * from `$TB` where".join("&&",$tmp);
                        $sql = "{$sel}where " . join("&&", $tmp);


                    } else {
                        // $sql = "select * from `$TB`";
                        //         xxxxxx
                        $sql = $sel;
                    }








                } else {
                    // $sql = "select * from `$TB` $where";
                    $sql ="{$sel}where ".$where;
                    // $sql = "$sel";
                }

                if(is_null($where)){
                    $sql = $sel;
                }
                
                echo $sql;

                // $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_BOTH);
                // $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_NUM);
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                // print_r($rows);
                echo "<br>";
                // echo $rows;
                return $rows;




            } else {
                throw new Exception("錯誤: 沒有指定正確的資料表名稱");
            }
        } else {
            throw new Exception("錯誤: 沒有指定正確的資料庫名稱");
        }
    } else {
        throw new Exception("錯誤: 沒有指定正確的伺服器");

// 嘗試:在資料庫出錯時跳出指定訊息
// 結果:失敗-僅有在輸入空值時跳出指定訊息，出錯時跳出下列訊息，但不是我預期的結果
    }
}
//     catch (PDOException $e) {
//         echo "PDO錯誤: " . $e->getMessage();
//     } catch (Exception $e) {
//         echo "一般錯誤: " . $e->getMessage();
//     }
// }
// $e、getMessage()是甚麼


// function all_A($SQL=null, $DB=null, $TB=null)
// {





//     if (isset($SQL) && !empty($SQL)) {
//         if (isset($DB) && !empty($DB)) {
//             $dsn = "mysql:host=$SQL;charset=utf8;dbname=$DB";
//             $pdo = new PDO($dsn, 'root', '');
//             if (isset($TB) && !empty($TB)) {
//                 $sql = "select * from `$TB`";
//                 $rows = $pdo->query($sql)->fetchAll();
//                 return $rows;
//             } else {
//                 echo "錯誤:沒有指定正確的資料表名稱";
//             }
//         } else {
//             echo "錯誤:沒有指定正確的資料庫名稱";
//         }

//     } else {
//         echo "錯誤:沒有指定正確的伺服器";
//     }

// }




function find($table,$id){
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo=new PDO($dsn,'root','');

    $sql="select * from `$table` ";



// 條件判斷
if(is_array($id)){
    foreach ($id as $col => $value) {
        $tmp[]="`$col`='$value'";
    }
    $sql .=" where " .join(" && " ,$tmp) ;
}elseif(is_numeric($id)){
    $sql .= "where `id` = '$id' ";
}else{
    echo"錯誤:參數的資料型態必須是數字或陣列";
}







    echo $sql;



   
    $row=$pdo -> query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function update($table,$id,$cols){
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo=new PDO($dsn,'root','');

    $sql="update `$table` set ``='',``='',``='' where `id` = ''";



    function update($table,$id,$cols){
        $dsn="mysql:host=localhost;charset=utf8;dbname=school";
        $pdo=new PDO($dsn,'root','');
    
        $sql="update `$table` set ";
    
        if(!empty($cols)){
            foreach($cols as $col => $value){
                $tmp[]="`$col`='$value'";
            }
        }else{
            echo "錯誤:缺少要編輯的欄位陣列";
        }
    
        $sql .= join(",",$tmp);

        $tmp=[];
    
        if(is_array($id)){
            foreach($id as $col => $value){
                $tmp[]="`$col`='$value'";
            }
            $sql .=" where ".join(" && ",$tmp);
        }else if(is_numeric($id)){
            $sql .= " where `id`='$id'";
        }else{
            echo "錯誤:參數的資料型態比須是數字或陣列";
        }
        echo $sql;
        return $pdo->exec($sql);
    }
    

}
// array_push(); 
// PUSH 資料

function insert($table,$values){
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo=new PDO($dsn,'root','');

    $sql= "insert into `$table`";

    $cols="(`".join("`,`",array_keys($table))."`)";
    // 把欄位/值獨立出來
    $vals="('".join("`,`",array_keys($values))."')";

    $sql=$sql . $cols ." values ". $vals;

    $pdo->exec($sql);

    return $sql;

}

// #1
// INSERT into `table` 
// ( ` ` , ` ` , ` `, ` ` )
// values
// ( ' ' , ' ' , ' ', ' ' )
// => THINK---------------------------------

    // 
        // ( ` col1 ` , ` col2 ` , ... )
        //      ⇓          ⇓
        // ( ' val1 ' , ' val2 ' , ... )

            // =>----------------------------------------
                 //  function insert(`table`, ..?.. ){
                         // [`col1`=>'vol1' , `col2`=>'vol2']
                 // }
            // ------------------------------------------
    
// #2
// INSERT into `table` 
// ( ` ` , ` ` , ` `, ` ` )
// values
// ( ' ' , ' ' , ' ', ' ' )
// =>-------------------------------------------

// For col, 以  "`,`" 區隔
        // join(  "`,`" , [`col1`,`col2`] )

// For val, 以  "','" 區隔
        // join(  "','" , ['val1'',`val2`] )





function delete($table,$id){}


function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>