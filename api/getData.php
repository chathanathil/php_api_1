<?php
    require '../dbConfig.php';
    class API{
        function Select(){
            $db=new Connect;
            $users=array();
            $data=$db->prepare('SELECT * from users ORDER BY id');
            $data->execute();
            while($OutputData=$data->fetch(PDO::FETCH_ASSOC)){
                $users[$OutputData['id']]=array(
                    'id'=>$OutputData['id'],
                    'name'=>$OutputData['name'],
                    'email'=>$OutputData['email']
                );
            }
            return json_encode($users);
        }
    }

    $API=new API;
    header('Content-Type:application/json');
    echo $API->Select()
  
?>