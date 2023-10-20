<?php 
   session_start();
   include("config.php");
   if(isset($_SESSION['user'])){
       
   }else{
       
       echo "<script> window.location='index.php' </script>";
   }
?>
<html>
   <head>
      <title>dashboard</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="assets/style.css">
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
            $done = "active";
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
                         <h1 class="text-center mb-5">Done Project</h1>
                         <div id="success_msg"></div>
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
                                         <td>Action</td>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $Q="SELECT *,paymnets.ex1 as pkg FROM paymnets inner join Questions on Questions.id=paymnets.q_id  where paymnets.user_id='".$_SESSION['user']['id']."' and status='2'";
                                    $re=mysqli_query($conn,$Q);
                                 $i=0;
                                    while($row=mysqli_fetch_assoc($re)){
                                        ?>
                                            <tr>
                                                <td><?php echo rand(0,9).rand(00,99).rand(000,999).$row['id']; ?></td>
                                                <td><a href="#" class="text-dark view" data-id="<?php echo $row['q_id'] ?>" style="text-decoration:none">View Details <i class="fa fa-eye text-primary"></i></a></td>
                                                <td><?php echo $row['pkg']; ?></td>
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
                                                if($rows['status']==2){
                                                    ?>
                                                  <p class=' badge bg-success view-delivery' data-qid="<?php echo $row['q_id'] ?>" style="cursor:pointer"> <i class='fa fa-eye'></i> <b>View Delivery</b></p>
                                                    <?php
                                                }
                                                ?></td>
                                                <td><a href="#" class="badge bg-primary ask-revision"  data-qid="<?php echo $row['q_id'] ?>" >Ask a Revision</a></td>
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
              $('#success_msg').hide();
             $('.view').on('click',function(e){
                 e.preventDefault();
                 var id=$(this).data('id');
                 $.ajax({
                    url:"get_details.php",
                    type:"post",
                    data:{id:id},
                    success:function(data){
                        
                        if(data!=''){
                            $('#data').html(data);
                            $('#exampleModal').modal('show');
                        }
                    }
                 });
             });
                    $('.ask-revision').on('click',function(e){
                e.preventDefault();
                var qid=$(this).data('qid');
                $('#Q_id').val(qid);
                $('#RevisionModal').modal('show');
                
           
             });
             $('.submit-revison').on('click',function(e){
                e.preventDefault();
                 var qid= $('#Q_id').val();
          var rev= $('#rev').val();
          if(rev==''){
              $('#rev').css('border','1px solid red');
          }else{
              $('#rev').css('border','1px solid green');
                        $.ajax({
                  url:"ask-revision.php",
                  type:"post",
                  data:{id:qid,rev:rev},
                  success:function(data){
                      console.log(data);
                      if(data==0){
                          $('#success_msg').html('<p class="text-danger"><strong>OOPS! </strong>Only 3 revisions are alowed!</p>');
                          $('#RevisionModal').modal('hide');
                      }
                      if(data==1){
                          $('#success_msg').html('<p class="text-success"><strong>Congratulations! </strong>Revisions request hase been placed successfully!</p>')
                          ;
                          $('#RevisionModal').modal('hide');
                              setTimeout(function() {
          window.location.href = 'on-going.php';
        }, 2000);
                      }
                      $('#success_msg').show();
                  }
              })
          }
    
             });
             
                     $('.view-delivery').on('click',function(e){
                e.preventDefault();
                var qid=$(this).data('qid');
                console.log(qid);
              $.ajax({
                  url:"get-delivery.php",
                  type:"post",
                  data:{id:qid},
                  success:function(data){
                      console.log(data);
                      if(data!=''){
                          $('#delivery_data').html(data);
                       
                      $('#DeliveryModal').modal('show');
                      }
                     
                  }
              });
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
  <!--Revision Modal -->
<div class="modal fade" id="RevisionModal" tabindex="-1" aria-labelledby="DeliveryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="border-top:5px solid #f6226f;">
      <div class="modal-header">
        <h5 class="modal-title" id="RevisionModalLabel">Resision</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <input type="hidden" id="Q_id">
        <textarea name="revision" id="rev" class="form-control" placeholder="Write Your Revisions Here...." rows='4'></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary submit-revison">Submit</button>
      </div>
     
    </div>
  </div>
</div>
      <!--Delivery Modal -->
<div class="modal fade" id="DeliveryModal" tabindex="-1" aria-labelledby="DeliveryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="border-top:5px solid #f6226f;">
      <div class="modal-header">
        <h5 class="modal-title" id="DeliveryModalLabel">Deliveries</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="delivery_data">
    
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
   </body>
</html>