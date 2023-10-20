    <?php include('config.php'); 
    
    $SQL="SELECT * FROM Questions where id='".$_POST['id']."'";
    $re=mysqli_query($conn,$SQL);
    $row=mysqli_fetch_assoc($re);
    ?>
    <div class="table-responsive">
                                     <table class="table table-hover">
                                        <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l1">Let's start! What title do you want to give your script?
</th>
                                           <td id="ans1"><?php echo $row['q1'] ?></td>
                                        </tr>
                                        <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l2">Excellent! Now, what main message do you want to convey with this script?
</th>
                                           <td id="ans2"><?php echo $row['q2'] ?></td>
                                        </tr>
                                        <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l3">Understood! To set the right tone, what kind of tone of voice do you envision for the script? Fun, emotional, serious, or something else?
</th>
                                           <td id="ans3"><?php echo $row['q3'] ?></td>
                                        </tr>
                                        <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l4">Excellent choice! Now, tell me what are the three key points or crucial scenes that you would like to include in the script?
</th>
                                           <td id="ans4"><?php echo $row['q4'] ?></td>
                                        </tr>
                                         <tr>
                                           <th style="width:200px; border-right:solid 2px lightgray;" id="l5">Excellent! To make the script perfect, it is important to know who it is intended for. Do you have a specific target audience in mind? Could it be for children, young adults, families, or another group?
</th>
                                           <td id="ans5"><?php echo $row['q5'] ?></td>
                                        </tr>
                                     </table>
                                  </div>