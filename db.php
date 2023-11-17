<?php
// $rows=all();
$rows = all_A(SQL:"localhost", DB:"school", TB:"students",where:"`id`<= 10");

dd($rows);


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
    }
}
//     catch (PDOException $e) {
//         echo "PDO錯誤: " . $e->getMessage();
//     } catch (Exception $e) {
//         echo "一般錯誤: " . $e->getMessage();
//     }
// }


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


function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>