<?php include("../config.php"); ?>
<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"></li>
                <li>
                    <a class="<?php echo $admin;?>" href="admin.php">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a class="<?php echo $users;?>" href="users.php">
                        Users
                    </a>
                </li>
                <li>
                    <a class="<?php echo $on;?>" href="on-going.php">
                        On going
                    </a>
                </li>
                <li>
                    <a class="<?php echo $comp;?>" href="complete-projects.php">
                        Projects Submited
                    </a>
                </li>
                 <li>
                    <a class="<?php echo $rev;?>" href="revisions.php">
                       Revisions
                    </a>
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
                    <a href="../logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>logout</p>
                    </a>
                </div>
            </div>
        </div>