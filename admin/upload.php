<?php
 include("../config.php");
  $date=date('Y-m-d');
if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $targetDir = 'uploads/';

    // Generate a unique file name using a combination of the current timestamp and a random string
    $uniqueName = time() . '-' . uniqid();

    // Extract the file extension from the original file name
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    // Create the new file name by appending the file extension to the unique name
    $newFileName = $uniqueName . '.' . $extension;

    // Create the target file path by combining the target directory and the new file name
    $targetFile = $targetDir . $newFileName;
   
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $Q="INSERT INTO `feedbacks`(`q_id`, `feedback`, `attachment`, `status`, `date`, `ex1`, `ex2`, `ex3`) 
VALUES ('".$_POST['id']."','".$_POST['msgg']."','$targetFile','1','$date','','','')";
            if(mysqli_query($conn,$Q)){
                $QQ="UPDATE `Questions` SET `status`='2' WHERE `id`='".$_POST['id']."'";
                if(mysqli_query($conn,$QQ)){
                    echo json_encode(['success' => true, 'message' => 'File uploaded successfully']);
                }else{
                     echo json_encode(['success' => false, 'message' => 'File could not be uploaded']);
                }
                
            }else{
                echo json_encode(['success' => false, 'message' => 'File could not be uploaded']);
            }
        
    } else {
        echo json_encode(['success' => false, 'message' => 'File could not be uploaded']);
    }
} else {
            $Q="INSERT INTO `feedbacks`(`q_id`, `feedback`, `attachment`, `status`, `date`, `ex1`, `ex2`, `ex3`) 
VALUES ('".$_POST['id']."','".$_POST['msgg']."','','1','$date','','','')";
  if(mysqli_query($conn,$Q)){
                $QQ="UPDATE `Questions` SET `status`='2' WHERE `id`='".$_POST['id']."'";
                if(mysqli_query($conn,$QQ)){
                    echo json_encode(['success' => true, 'message' => 'Project Submitted Successfully!']);
                }else{
                     echo json_encode(['success' => false, 'message' => 'File could not be uploaded']);
                }
                
            }else{
                echo json_encode(['success' => false, 'message' => 'File could not be uploaded']);
            }

}
?>
