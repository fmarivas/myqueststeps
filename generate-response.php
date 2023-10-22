<?php 
   session_start();
   if(isset($_SESSION['user'])){
       
   }else{
       
       echo "<script> window.location='index.php' </script>";
   }
   ?>
<html>
   <head>
      <title>dashboard</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" />
      <link rel="stylesheet" href="assets/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div id="wrapper">
         <style>
            .profile-box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              border-top: 4px solid #f6226f;
            padding: 20px;
            max-width: 90%;
            margin: 0 auto;
            margin-top: 100px;
            }
            .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 10px;
            }
            .user-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            }
            .welcome-message {
            font-size: 16px;
            color: #888;
            }
            .form-control{
                border-left:none;
                border-right:none !important;
                border-top:none !important;

                outline:none !important;
                border-bottom:solid 2px lightgray;
                margin-top:20px;
            }
            .btn-outline-danger, .btn-outline-success{
                padding:8px 35px !important;
                margin-top:10px !important;
                  border: 2px solid #f6226f;
            }
            textarea{
                resize:none;
            }
            .plan-button1{
                opacity:0.6;
                cursor:no-drop;
            }
         </style>
         <!-- Sidebar -->
         <?php 
            $web_new = "active";
            include("container/menu.php"); ?>
         <!-- /#sidebar-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="desktop_hide">
               <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
               <i class="fa fa-bars"></i>
               </a>
            </div>
            <div class="container-fluid">
               <form action="">
                  <div class="row justify-content-center" >
                     <div class="col-md-12">
                        <div class="profile-box">
                            <h3 id="title">Please Provide Your Reponse</h3>
                            <p class="alert alert-success" id="msg"></p>
                            <br>
                            <div class="row" id="step_1">
                               <div class="col-md-12 mt-3">
                                  <h5 class="welcome-message" id="a1">Let's start! What title do you want to give your script?</h5>
                                  <input type="text" name="name" id="q1" class="form-control">
                               </div>
                               <div class="col-md-12 mt-3">
                                  <a href="#" class="step_1 btn btn-outline-danger">Next</a>
                               </div>
                            </div>
                            <div class="row" id="step_2">
                               <div class="col-md-12 mt-3">
                                  <h5 class="welcome-message" id="a2">Excellent! Now, what main message do you want to convey with this script?</h5>
                                  <textarea  name="email" id="q2" class="form-control"  rows="5"></textarea>
                               </div>
                               <div class="col-md-12 mt-3">
                                  <a href="#" class="step_2 btn btn-outline-danger">Next</a>
                               </div>
                            </div>
                            <div class="row" id="step_3">
                               <div class="col-md-12 mt-3">
                                  <h5 class="welcome-message"  id="a3">Understood! To set the right tone, what kind of tone of voice do you envision for the script? Fun, emotional, serious, or something else?</h5>
                                  <input type="text" name="location" id="q3" class="form-control">
                               </div>
                               <div class="col-md-12 mt-3">
                                  <a href="#" class="step_3 btn btn-outline-danger">Next</a>
                               </div>
                            </div>
                            <div class="row" id="step_4">
                               <div class="col-md-12 mt-3">
                                  <h5 class="welcome-message" id="a4">Excellent choice! Now, tell me what are the three key points or crucial scenes that you would like to include in the script?</h5>
                                  <input type="text" name="location" id="q4" class="form-control">
                               </div>
                               <div class="col-md-12 mt-3">
                                  <a href="#" class="step_4 btn btn-outline-danger">Next</a>
                               </div>
                            </div>
                            <div class="row" id="step_5">
                               <div class="col-md-12 mt-3">
                                  <h5 class="welcome-message"  id="a5">Excellent! To make the script perfect, it is important to know who it is intended for. Do you have a specific target audience in mind? Could it be for children, young adults, families, or another group?</h5>
                                  <input type="text" name="location" id="q5" class="form-control">
                               </div>
                               <div class="col-md-12 mt-3">
                                  <a href="#" class="step_5 btn btn-outline-danger">Next</a>
                               </div>
                            </div>
                            <div class="row" id="last_step">
                               <div class="col-md-12 mt-3 d-flex align-items-center" style="gap:10px">
                                   <input type="checkbox" id="checkbox" value="1">
                                  <h5 class="welcome-message" id="a_last" style="margin:0px;padding:0px;"> I confirm that the information provided is correct.</h5>
                               </div>
                               <div class="col-md-12 mt-3">
                                  <a href="#" class="last_step btn btn-outline-danger">Next</a>
                                  <!--<a href="#" class="last_step btn btn-danger w-100 mt-3">modify</a>-->
                               </div>
                            </div>
                            
                            <div id="summary" class="row"><!-- summary -->
                            <div class="col-md-1"></div>
                               <div class="col-md-10">
                                  <div class="table-responsive">
                                     <table class="table table-hover">
                                        <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l1"></th>
                                           <td id="ans1"></td>
                                        </tr>
                                        <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l2"></th>
                                           <td id="ans2">email1</td>
                                        </tr>
                                        <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l3"></th>
                                           <td id="ans3">location1</td>
                                        </tr>
                                        <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l4"></th>
                                           <td id="ans4">bio1</td>
                                        </tr>
                                         <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l5"></th>
                                           <td id="ans5">bio1</td>
                                        </tr>
                                     </table>
                                  </div>
                               </div>
                               <div class="col-md-12 mt-3 text-center">
                                  <a href="#" class="modify btn btn-outline-danger">Modify</a> &nbsp;
                                  <a href="#" class="submit btn btn-outline-success" style="border:solid 2px green;">Continue</a>
                                  <br><br>
                               </div>
                               
                            </div>
                            
                            
                            <div class="plans" id="pkgs"><!-- pkgs -->
                               <!-- <div class="row">-->
                               <!--     <div class="col-md-3">-->
                               <!--         <div class="plan">-->
                            			<!--	<h3 class="plan-title">Started</h3>-->
                            			<!--	<p class="plan-price">$19 <span class="plan-unit">per month</span></p>-->
                            			<!--	<ul class="plan-features">-->
                            			<!--		<li class="plan-feature">2 <span class="plan-feature-name">websites</span></li>-->
                            			<!--		<li class="plan-feature">5 <span class="plan-feature-unit">GB</span></li>-->
                            			<!--		<li class="plan-feature">3 <span class="plan-feature-name">users</span></li>-->
                            			<!--	</ul>-->
                            			<!--	<a href="#" class="plan-button" data-price='19' data-plan='Started' id="pkg_1">Choose Plan</a>-->
                            			<!--</div>-->
                               <!--     </div>-->
                               <!--     <div class="col-md-3">-->
                               <!--         <div class="plan plan-highlight">-->
                            			<!--	<p class="plan-recommended">Recommended</p>-->
                            			<!--	<h3 class="plan-title">Team</h3>-->
                            			<!--	<p class="plan-price">$49 <span class="plan-unit">per month</span></p>-->
                            			<!--	<ul class="plan-features">-->
                            			<!--		<li class="plan-feature">5 <span class="plan-features-name">websites</span></li>-->
                            			<!--		<li class="plan-feature">20 <span class="plan-features-unit">GB</span></li>-->
                            			<!--		<li class="plan-feature">10 <span class="plan-features-name">users</span></li>-->
                            			<!--	</ul>-->
                            			<!--	<a href="#" class="plan-button" data-price='49'  data-plan='Team' id="pkg_2">Choose Plan</a>-->
                            			<!--</div>-->
                               <!--     </div>-->
                               <!--     <div class="col-md-3">-->
                                        
                               <!--     </div>-->
                               <!--     <div class="col-md-3">-->
                               <!--         	<div class="plan">-->
                            			<!--	<h3 class="plan-title">Premium</h3>-->
                            			<!--	<p class= "plan-price">$99 <span class="plan-unit">per month</span></p>-->
                            			<!--	<ul class="plan-features">-->
                            			<!--		<li class="plan-feature">20 <span class="plan-feature-name">websites</span></li>-->
                            			<!--		<li class="plan-feature">50<span class="plan-feature-unit">GB</span> <span class="plan-feature-name">storage</span></li>-->
                            			<!--		<li class="plan-feature">25 <span class="plan-feature-name">users</span></li>-->
                            			<!--	</ul>-->
                            			<!--	<a href="#" class="plan-button" data-price='99' data-plan='Premium' id="pkg_3">Choose Plan</a>-->
                            			<!--</div>-->
                               <!--     </div>-->
                               <!-- </div>-->
                    			
                    			<div class="row">
                                   <div class="col-sm-3 col-md-3">
                                      <div class="plan  ">
                                         <div class="head">
                                            <h2>Starter</h2>
                                         </div>
                                         <ul class="item-list">
                                            <li><strong>20GB</strong> Storage</li>
                                            <li><strong>10</strong> Email Addresses</li>
                                            <li><strong>5</strong> Domains</li>
                                            <li><strong>Endless</strong> Support</li>
                                         </ul>
                                         <div class="price">
                                            <h3><span class="symbol">$</span>0</h3>
                                            <h4></h4>
                                         </div>
                                         <a class="plan-button btn btn-dark" data-price='0.1' data-plan='Started' id="pkg_0">Choose Plan</a>
                                      </div>
                                   </div>
                                   <div class="col-sm-3 col-md-3 ">
                                      <div class="plan ">
                                         <div class="head">
                                            <h2>Value</h2>
                                         </div>
                                         <ul class="item-list">
                                            <li><strong>50GB</strong> Storage</li>
                                            <li><strong>10</strong> Email Addresses</li>
                                            <li><strong>15</strong> Domains</li>
                                            <li><strong>Endless</strong> Support</li>
                                         </ul>
                                         <div class="price">
                                            <h3><span class="symbol">$</span>19</h3>
                                            <h4></h4>
                                         </div>
                                          <a class="plan-button1 btn btn-dark" disabled  data-price='19' data-plan='Started' id="pkg_1">Choose Plan</a>
                                          <p style="color:red;">Comming Soon</p>
                                      </div>
                                   </div>
                                   <div class="col-sm-3 col-md-3 ">
                                      <div class="plan recommended">
                                         <div class="head">
                                            <h2>Pro</h2>
                                         </div>
                                         <ul class="item-list">
                                            <li><strong>200GB</strong> Storage</li>
                                            <li><strong>20 </strong>Email Addresses</li>
                                            <li><strong>25</strong> Domains</li>
                                            <li><strong>Endless</strong> Support</li>
                                         </ul>
                                         <div class="price">
                                            <h3><span class="symbol">$</span>49</h3>
                                            <h4></h4>
                                         </div>
                                         <a class="plan-button1 btn btn-danger"  disabled style="background-color:#f6226f; " data-price='49'  data-plan='Team' id="pkg_2">Choose Plan</a>
                                         <p style="color:red;">Comming Soon</p>
                                      </div>
                                   </div>
                                   <div class="col-sm-3 col-md-3 ">
                                      <div class="plan last">
                                         <div class="head">
                                            <h2>Premium</h2>
                                         </div>
                                         <ul class="item-list">
                                            <li><strong>200GB</strong> Storage</li>
                                            <li><strong>20</strong> Email Addresses</li>
                                            <li><strong>Unlimited</strong> Domains</li>
                                            <li><strong>Endless</strong> Support</li>
                                         </ul>
                                         <div class="price">
                                            <h3><span class="symbol">$</span>99</h3>
                                            <h4></h4>
                                         </div>
                                         <a class="plan-button1 btn btn-dark" disabled  data-price='99' data-plan='Premium' id="pkg_3">Choose Plan</a>
                                         <p style="color:red;">Comming Soon</p>
                                      </div>
                                   </div>
                                </div>
                    		
                            </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!-- /#page-content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
      <script>
         $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
         });
         
         $(document).ready(function(){
             var id;
             <?php
             if(isset($_GET['payment']) && $_GET['payment']=='successfull'){
                 ?>
                 $("#step_1").hide();
                    $("#step_2").hide();
                     $("#step_3").hide();
                     $("#step_4").hide();
                     $("#step_5").hide();
                     $("#last_step").hide();
                     $("#summary").hide();
                     $("#pkgs").hide();
                     $("#msg").show();
                     $("#msg").html("Your payment has been successfully processed! <strong>Thank you</strong>");
                     $("#title").html("Payment Status");
                                          $("#msg").show();

                     <?php
             }else{
                 ?>
                 $("#step_2").hide();
                     $("#step_3").hide();
                     $("#step_4").hide();
                     $("#step_5").hide();
                     $("#last_step").hide();
                     $("#summary").hide();
                     $("#pkgs").hide();
                                      $("#msg").hide();

                 <?php
             }
             
             
             ?>
         $("#step_2").hide();
         $("#step_3").hide();
         $("#step_4").hide();
         $("#step_5").hide();
         $("#last_step").hide();
         $("#summary").hide();
         $("#pkgs").hide();
         
         $(".step_1").on('click',function(e){
         e.preventDefault();
         var q1=$('#q1').val();
         if(q1==""){
             $("#q1").css("border-color","red");
         }
         
         if(q1!=""){
             $("#step_1").hide();
             $("#step_2").show();
         }
         });
         
         $(".step_2").on('click',function(e){
         e.preventDefault();
         var q2=$('#q2').val();
         if(q2==""){
             $("#q2").css("border-color","red");
         }
         
         if(q2!=""){
             $("#step_2").hide();
             $("#step_3").show();
         }
         });
         $(".step_3").on('click',function(e){
         e.preventDefault();
         var q3=$('#q3').val();
         if(q3==""){
             $("#q3").css("border-color","red");
         }
         
         if(q3!=""){
             $("#step_3").hide();
             $("#step_4").show();
         }
         });
        $(".step_4").on('click',function(e){
         e.preventDefault();
         var q4=$('#q4').val();
         if(q4==""){
             $("#q4").css("border-color","red");
         }
         
         if(q4!=""){
             $("#step_4").hide();
             $("#step_5").show();
         }
         });
        $(".step_5").on('click',function(e){
         e.preventDefault();
         var q5=$('#q5').val();
         if(q5==""){
             $("#q5").css("border-color","red");
         }
         
         if(q5!=""){
             $("#step_5").hide();
             $("#last_step").show();
         }
         });
         $(".last_step").on('click',function(e){
         e.preventDefault();
            if ($('#checkbox').is(':checked')) {
              $("#a_last").css("color","green");
              var a1=$("#a1").html();
              $("#l1").html(a1);
              var a2=$("#a2").html();
                            $("#l2").html(a2);

               var a3=$("#a3").html();
                             $("#l3").html(a3);

               var a4=$("#a4").html();
                             $("#l4").html(a4);

               var a5=$("#a5").html();
                             $("#l5").html(a5);


              
              var q1=$("#q1").val();
              $("#ans1").html(q1);
              var q2=$("#q2").val();
              $("#ans2").html(q2);
               var q3=$("#q3").val();
              $("#ans3").html(q3);
               var q4=$("#q4").val();
              $("#ans4").html(q4);
               var q5=$("#q5").val();
              $("#ans5").html(q5);
                         $("#last_step").hide();
                     $("#summary").show();
                      $("#title").html("Summary");
              
            } else {
              $("#a_last").css("color","red");
            }

   
                //  if(cover==''){
                //                  $("#cover").css("border-color","red");
         
                //  }
                //  if(cover!=''){
                     
                //      var fname=$('#fname').val();
                //      var email=$('#email').val();
                //      var location=$('#location').val();
                     
                //      $('#name1').html(fname);
                //      $('#email1').html(email);
                //      $('#location1').html(location);
                //      $('#bio1').html(cover);
                //      $("#last_step").hide();
                //      $("#summary").show();
         
                //      $("#title").html("Summary");
                //  }
         
         
         
         });
         $('.modify').click(function(e){
         e.preventDefault();
         $("#step_2").hide();
         $("#step_3").hide();
         $("#last_step").hide();
         $("#summary").hide();
                 $("#step_1").show();
                 
         
         });
         $(".submit").click(function(e){
         e.preventDefault();
         
         
         
        var a1=$("#a1").html();
        var a2=$("#a2").html();
        var a3=$("#a3").html();
        var a4=$("#a4").html();
        var a5=$("#a5").html();
        var q1=$("#q1").val();
        var q2=$("#q2").val();
        var q3=$("#q3").val();
        var q4=$("#q4").val();
        var q5=$("#q5").val();
        $.ajax({
            url:"submit_questions.php",
            method:"post",
            data:{a1:a1,a2:a2,a3:a3,a4:a4,a5:a5,
                q1:q1,q2:q2,q3:q3,q4:q4,q5:q5
            },
            success:function(data){
                console.log(data);
                if(data){
                      $("#summary").hide();
         $("#title").html("Payment");
         $("#pkgs").show();
         id=data;
        // alert(id);
                
             }
            }
        });
         
         
         
          
         });
         $('.plan-button').on('click',function(e){
             
             e.preventDefault();
             var price=$(this).data('price');
              var plan=$(this).data('plan');
              if(price == "0.1"){
                  window.location='http://ec2-3-88-224-223.compute-1.amazonaws.com/submit_payment.php?price='+price+'&plan='+plan+'&id='+id;
              }else{
                  window.location='http://ec2-3-88-224-223.compute-1.amazonaws.com/paypal.php?price='+price+'&plan='+plan+'&id='+id;
              }
              
         })
         
         
         });
         
         
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </body>
</html>