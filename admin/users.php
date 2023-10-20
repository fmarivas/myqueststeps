<?php 
   session_start();
   if(isset($_SESSION['user']) && $_SESSION['user']['role']==1){
       
   }else{
       
       echo "<script> window.location='../index.php' </script>";
   }
   ?>
<html>
   <head>
      <title>dashboard</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="../assets/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  

   </head>
   <body>
      <style>
         .profile-box {
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         text-align: center;
         padding: 60px 40px;
         max-width: 80%;
         margin: 0 auto;
         margin-top: 100px;
           border-top: 4px solid #f6226f;
         }
         .profile-image {
         width: 100px;
         height: 100px;
         border-radius: 50%;
         object-fit: cover;
         margin: 0 auto 10px;
           border: 4px solid #f6226f;
         }
         .user-name {
         font-size: 18px;
         font-weight: bold;
         margin-bottom: 5px;
         }
         .welcome-message {
         font-size: 22px;
         color: #888;
         }
         .wrapper{
             display:flex;
             flex-direction:column;
             align-items:center;
             justify-content:center;
             border-radius:10px;
             border-top:3px solid #f6226f;
             width:33%;
              padding:20px;
              gap:10px;
             box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
         }
         .row-new{
             display:flex;
             width:100%;
             gap:20px;
            
         }
         .wrapper i{
             background:#f6226f;
             padding:10px;
             border-radius:50px;
             color:#fff;
             font-size:30px;
			 
         }
         
         
         
         
         
         


      </style>
      <div id="wrapper">
         <!-- Sidebar -->
         
            <?php
            $users='active';
            include("container/menu.php") ?>
         <!-- /#sidebar-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper" >
            <div class="desktop_hide">
               <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
               <i class="fa fa-bars"></i>
               </a>
            </div>
            <div class="container-fluid">
               
                <div class="row">
                     <div class="col-12" style="border-top:5px solid #f6226f; border-radius:10px;box-shadow:2px 10px 20px rgba(0, 0, 0, 0.1)">
                          <h1 class="mb-3 mt-3 text-center">Users</h1>
                        <div class="table-responsive">
                            <table class="table table-striped  table-hover mt-5"  id="usertable">
                                <thead>
                                    <tr>
                                        <th>SN:#</th>
                                        <th>Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Date</th>
                                        <th>User Type</th>
                                        <th>Role</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                   $Q="SELECT * FROM `users` where `role`!=1";
                                   $re=mysqli_query($conn,$Q);
                                   $i=0;
                                   while($row=mysqli_fetch_assoc($re)){
                                       ?>
                                       <tr>
                                           <td><?php echo $i; ?></td>
                                           <td><img style="width:50px;height:50px;border-radius:50px;" src="<?php if(empty($row['ex1'])){ echo "../assets/profile.jpg"; }else{ echo $row['ex1']; } ?>"></td>
                                           <td><?php echo $row['fname']; ?></td>
                                           <td><?php echo $row['lname']; ?></td>
                                           <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['source']; ?></td>
                                            <td><?php if($row['role']==0){
                                                ?>
                                                <p class="badge bg-success">User</p>
                                                <?php
                                            }else{
                                                ?>
                                                <p class="badge bg-primary">Admin</p>
                                                <?php
                                            }
                                            ?></td>
                                            
                                       </tr>
                                       <?php
                                       $i++;
                                   }
                                   
                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
            </div>
         </div>
         <!-- /#page-content-wrapper -->
      </div>

      <!-- /#wrapper -->
     
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
           <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
      <script>
         $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
         });
         $(document).ready( function () {
    $('#usertable').DataTable();
} );
      </script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </body>
</html>