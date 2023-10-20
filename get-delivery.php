<?php
include('config.php');
extract($_POST);
$Q="SELECT * FROM `feedbacks` WHERE `q_id`='$id'";
$re=mysqli_query($conn,$Q);
while($row=mysqli_fetch_assoc($re)){
    // print_r($row);
        if(empty($row['attachment'])){
          ?>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div style="padding:10px;border-radius:10px;">
                        <p class="mt-2 mb-2">
                            <?php echo $row['feedback']; ?>
                            </p>
                        <p class="badge bg-success"><i class="fa fa-clock bg-success text-white p-1 rounded-circle"></i> <?php echo ' '.$row['date']; ?></p>
                    </div>
                </div>
                
            </div>
        <?php
    }else{
        $new=explode('/',$row['attachment']);
        ?>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div style="padding:10px;border-radius:10px;">
                        <p class="mt-2 mb-2">
                            <?php echo $row['feedback']; ?>
                            </p>
                            <br>
                        <a target="_blank" href="<?php echo 'admin/'.$row['attachment']; ?>" >Cick here to download/view the attachement.</a>
                        <br><br>
                        <p class="mt-3">Delivery Date: <span class="badge bg-success "><i class="fa fa-clock bg-success text-white p-1 rounded-circle"></i> <?php echo ' '.$row['date']; ?></span></p>
                    </div>
                </div>
                
            </div>
        <?php
    }


    
}




?>