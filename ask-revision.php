<?php 
include('config.php');
extract($_POST);
$Q="SELECT * FROM `Questions` WHERE `id`='$id'";
$re=mysqli_query($conn,$Q);
$row=mysqli_fetch_assoc($re);
// print_r($row);
$date=date('Y-m-d');
if($row['ex1']=='3'){
    echo '0';
}else{
    if($row['ex1']=='2'){
        $SQL="UPDATE `Questions` SET `status`='3' ,`ex1`='3' WHERE `id`='$id'";
    }
     if($row['ex1']=='1'){
        $SQL="UPDATE `Questions` SET `status`='3' ,`ex1`='2' WHERE `id`='$id'";
    }
     if(empty($row['ex1'])){
        $SQL="UPDATE `Questions` SET `status`='3' ,`ex1`='1' WHERE `id`='$id'";
    }
    
    $query="INSERT INTO `revisions`( `q_id`, `revision`, `date`, `ex1`, `ex2`, `ex3`) VALUES ('$id','$rev','$date','','','')";
    if(mysqli_query($conn,$query)){
        if(mysqli_query($conn,$SQL)){
           echo '1';
         }
    }
    
}

?>