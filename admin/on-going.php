<?php 
   session_start();
   include("../config.php");
   if(isset($_SESSION['user']) ){
       
   }else{
       
       echo "<script> window.location='index.php' </script>";
   }
?>
<html>
   <head>
      <title>dashboard</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="../assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      </style>
      <div id="wrapper">
         <!-- Sidebar -->
         <?php
            $on = "active";
            include("container/menu.php"); ?>
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
                  <div class="col-lg-12">
                     <div class="profile-box" style="border-top:none;border-left:4px solid #F6226F;">
                         <h1 class="text-center mb-5">On Going Project</h1>
                         <div class="table-responsive">
                             <table class="table table-hover" id="usertable">
                                 <thead>
                                     <tr>
                                         <th>SN#</th>
                                         <th>Details</th>
                                         <th>Package</th>
                                         <th>Initiated Date</th>
                                         <th>Deadline</th>
                                         <th>Status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $Q="SELECT * FROM paymnets inner join Questions on Questions.id=paymnets.q_id  where Questions.status!='2'";
                                    $re=mysqli_query($conn,$Q);
                                 $i=0;
                                    while($row=mysqli_fetch_assoc($re)){
                                        ?>
                                            <tr>
                                                <td><?php echo rand(0,9).rand(00,99).rand(000,999).$row['q_id']; ?></td>
                                                <td><a href="#" class="text-dark view" data-id="<?php echo $row['q_id'] ?>" style="text-decoration:none">View Details <i class="fa fa-eye text-primary"></i></a></td>
                                                <td><?php echo $row['ex1']; ?></td>
                                                <td><?php
                                                echo $row['date'];
                                                ?></td>
                                                <td> 
                                                <?php 
                                                $date=date('Y-m-d');
                                                if($date>$row['ex3']){
                                                    $date1 = new DateTime($row['ex3']);
                                                $date2 = new DateTime(date('Y-m-d'));
                                                
                                                $interval = $date1->diff($date2);
                                                    ?>
                                                <i class="fa fa-clock text-danger border-danger" data-bs-toggle="tooltip" title="<?php  echo  $interval->days . ' days Delay';?>"></i>
                                                <?php
                                                }else{
                                                $date1 = new DateTime($row['ex3']);
                                                $date2 = new DateTime(date('Y-m-d'));
                                                
                                                $interval = $date1->diff($date2);
                                                ?>
                                                <i class="fa fa-clock text-success" data-bs-toggle="tooltip" title="<?php  echo  $interval->days . ' days left';?>"></i>
                                                <?php
                                               
                                                }
                                                 
                                                ?>
                                                
                                                <?php
                                                    echo " ".$row['ex3'];
                                                ?></td>
                                                 <td><?php $QQ="Select * from `Questions` where id='".$row['q_id']."'";
                                                $res=mysqli_query($conn,$QQ);
                                                $rows=mysqli_fetch_assoc($res);
                                                if($rows['status']==1){
                                                    echo "<p class='text-success'><b>Active</b></p>";
                                                }
                                                 if($rows['status']==2){
                                                    echo "<p class='text-primary'><b>Completed</b></p>";
                                                }
                                                ?></td>
                                                <td>
                                                    <?php 
                                                    if($rows['status']==2){
                                                        ?>
                                                         <i class="fa fa-arrow-right bg-primary text-white p-2 rounded " data-idd='<?php echo $row['q_id']; ?>' style="cursor:no-drop;opacity:0.6;"></i>

                                                        <?php
                                                        
                                                    }else{
                                                        ?>
                                                         <i class="fa fa-arrow-right bg-primary text-white p-2 rounded update" data-idd='<?php echo $row['q_id']; ?>' style="cursor:pointer"></i>

                                                        <?php
                                                    }
                                                    
                                                    ?>
                                                </td>
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
      <script>
          $(document).ready(function(){
             $('.view').on('click',function(e){
                 e.preventDefault();
                 var id=$(this).data('id');
                 $.ajax({
                    url:"../get_details.php",
                    type:"post",
                    data:{id:id},
                    success:function(data){
                        console.log(data);
                        if(data!=''){
                            $('#data').html(data);
                            $('#exampleModal').modal('show');
                        }
                    }
                 });
             });
             $('.update').on('click',function(e){
                e.preventDefault();
                var idd= $(this).data('idd');
        
                $('#dataid').val(idd);
                $('#statusmodal').modal('show');
             });
             $('#attachment').click(function(e){
                e.preventDefault();
                
                $('#file').click();
             });
          });
      </script>
      <script>
// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
      <!-- Modal -->
<div class="modal fade" id="statusmodal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="border-top:5px solid #f6226f;">
      <div class="modal-header">
        <h5 class="modal-title" id="statusmodalLabel">Submit Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="data1">
          <div id="loader" style="display:none;width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.5);position:absolute;top:0px;left:0px;z-index:11111" >
                   <div class="spinner-border text-white" role="status"><span class="visually-hidden">Loading...</span></div>
          </div>
            <div id="msg-alert"></div>
          <form id="uploadform" enctype="multipart/form-data" type="post">
                        <input type="hidden" name="id" id="dataid" value="">
                  <textarea class="form-control" id="msgg" name="msgg" placeholder="FeedBack" required></textarea>
                  <input type="file" name="file" id="file" hidden />
          

      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-secondary btn-sm">Submit Project</button>
        </form>
        <button type="button" class="btn btn-primary btn-sm" style="height:100%" id="attachment"><i class="fa fa-link"></i> Attachment</button>
      </div>
    </div>
  </div>
</div>
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="border-top:5px solid #f6226f;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="data">
        ...
      </div>
     
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
$('#loader').hide();
$('#msg-alert').hide();
        $('#uploadform').on('submit', function(e) {
  e.preventDefault();

  var formData = new FormData(this);
$('#loader').show();
  $.ajax({
    url: 'upload.php',
    method: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
        $('#loader').hide();
      var data = JSON.parse(response);
      console.log(data);
      if (data.success) {
        $('#msg-alert').html('<p class="alert alert-success mb-3">'+data.message+'</p>');
         $('#uploadform')[0].reset();
        $('#msg-alert').show();
         setTimeout(function() {
          window.location.href = 'on-going.php';
        }, 2000);
      } else {
        $('#msg-alert').html('<p class="alert alert-danger mb-3">'+data.message+'</p>');
        $('#msg-alert').show();
      }
    },
    error: function() {
        $('#loader').hide();
            $('#msg-alert').html('<p class="alert alert-success mb-3">File Upload failed</p>');
        $('#msg-alert').show();
    }
  });
});

    })
</script>
   </body>
</html>