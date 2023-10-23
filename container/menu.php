<?php

if(isset($_SESSION['user'])){
    if( $_SESSION['user']['role']=='0'){
        
    }else{
        echo "<script>window.location='admin/admin.php'</script>";
    }
}else{
    echo "<script>window.location='index.php'</script>";   
}
?>

 <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
					<div id="logo-overlay">
						<img src="../assets/logo.png" style="width: 60px; height: 60px;" alt="QuestSteps">
					</div>				
				</li>
                <li>
                    <a class="<?php echo $web_dash;?>" href="dashboard.php">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a class="<?php echo $web_new;?>" href="generate-response.php">New</a>
                </li>
                <li>
                    <a class="<?php echo $on_going;?>" href="on-going.php">On Going</a>
                </li>
                <li>
                    <a class="<?php echo $done;?>" href="done.php">Done</a>
                </li>
                <li>
                    <a href="#">Tips</a>
                </li>
           
            </ul>
            <div class="bottom">
                <div class="user">
                    <?php if(empty($_SESSION['user']['ex1'])){
                    ?>
                    <i class="fa-solid fa-circle-user"></i>
                    <?php
                    }else{
                        ?>
                        <img src="<?php echo $_SESSION['user']['ex1']; ?>">
                        <?php
                    } ?>
                   <p><?php echo $_SESSION['user']['fname']." ",$_SESSION['user']['lname']; ?></p>
                </div>
                <div class="logout">
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>logout</p>
                    </a>
                </div>
            </div>
        </div>