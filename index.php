<?php 
  include('server.php'); 
  if (!isset($_SESSION['user_id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['user_id']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="content">
    <div class="header">
      <h2 style="background-color: #0099cc; padding:10px; font-size: 30px; color: #fff; text-align: center;">Home Page</h2>
    </div>
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['user_id'])) : ?>
      <p style="font-size: 20px; padding: 5px 0px;">Welcome <b><?php echo $_SESSION['user_id']; ?></b> <a href="index.php?logout='1'" style="color: red; float: right;">Log Out</a> </p>
      <br/>


      <table class="indexTable">
        <tr>
          <td></td>
          <td>12am-3am</td>
          <td>3am-6am</td> 
          <td>6am-9am</td>
          <td>9am-12pm</td>
          <td>12pm-3pm</td>
          <td>3pm-6pm</td>
          <td>6pm-9pm</td>
          <td>9pm-12am</td>
        </tr>

      <?php 
        $user_id = $_SESSION['user_id'];
        $fetch = "SELECT * FROM users WHERE user_id='$user_id'";
        $done = mysqli_query($db,$fetch);
        $row=mysqli_fetch_array($done);
        $day = $row['day'];
        $slots = $row['slots'];



        $query = "SELECT * FROM day";
        $result = mysqli_query($db,$query);
        while ($rows=mysqli_fetch_array($result)) {
          if ($day == $rows['days']) {
            if ($row['slots'] == "slot1") {
              $sql = "UPDATE day SET slot1='Booked' WHERE days='$day'";
              mysqli_query($db, $sql);
            }
            if ($slots == "slot2") {
              $sql = "UPDATE day SET slot2='Booked' WHERE days='$day'";
              mysqli_query($db, $sql);
            }
            if ($slots == "slot3") {
              $sql = "UPDATE day SET slot3='Booked' WHERE days='$day'";
              mysqli_query($db, $sql);
            }
            if ($slots == "slot4") {
              $sql = "UPDATE day SET slot4='Booked' WHERE days='$day'";
              mysqli_query($db, $sql);
            }
            if ($slots == "slot5") {
              $sql = "UPDATE day SET slot5='Booked' WHERE days='$day'";
              mysqli_query($db, $sql);
            }
            if ($slots == "slot6") {
              $sql = "UPDATE day SET slot6='Booked' WHERE days='$day'";
              mysqli_query($db, $sql);
            }
            if ($slots == "slot7") {
              $sql = "UPDATE day SET slot7='Booked' WHERE days='$day'";
              mysqli_query($db, $sql);
            }
            if ($slots == "slot8") {
              $sql = "UPDATE day SET slot8='Booked' WHERE days='$day'";
              mysqli_query($db, $sql);
            }
          }
      ?>
        <tr>
          <td><?php echo $rows['days'];?></td>
          <td><?php if ($rows['slot1']!=NULL) {echo "Booked";}?></td>
          <td><?php if ($rows['slot2']!=NULL) {echo "Booked";}?></td>
          <td><?php if ($rows['slot3']!=NULL) {echo "Booked";}?></td>
          <td><?php if ($rows['slot4']!=NULL) {echo "Booked";}?></td>
          <td><?php if ($rows['slot5']!=NULL) {echo "Booked";}?></td>
          <td><?php if ($rows['slot6']!=NULL) {echo "Booked";}?></td>
          <td><?php if ($rows['slot7']!=NULL) {echo "Booked";}?></td>
          <td><?php if ($rows['slot8']!=NULL) {echo "Booked";}?></td>
        </tr>
      <?php 
      } ?>
      </table>

    <br><br>
      <?php 
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id='$user_id'";
        $result = mysqli_query($db,$query);
        while ($rows=mysqli_fetch_array($result)) {
          if (($rows['day'] && $rows['slots']) == NULL) {
           
      ?> 
        <form method="post" action="index.php" class="indexForm">

          <?php include('errors.php'); ?>
          <br/>
          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
          <label for="Time slots"><b>Select a day of the week</b></label>
          <select name="day">
            <option value="0" <?php if ($rows['day']==NULL){?> selected <?php }?>>Select time</option>
            <option value="Sunday" <?php if ($rows['day']=="Sunday"){?> selected <?php }?>>Sunday</option>
            <option value="Monday" <?php if ($rows['day']=="Monday"){?> selected <?php }?>>Monday</option>
            <option value="Tuesday" <?php if ($rows['day']=="Tuesday"){?> selected <?php }?>>Tuesday</option>
            <option value="Wednesday" <?php if ($rows['day']=="Wednesday"){?> selected <?php }?>>Wednesday</option>
            <option value="Thursday" <?php if ($rows['day']=="Thursday"){?> selected <?php }?>>Thursday</option>
            <option value="Friday" <?php if ($rows['day']=="Friday"){?> selected <?php }?>>Friday</option>
            <option value="Saturday" <?php if ($rows['day']=="Saturday"){?> selected <?php }?>>Saturday</option>
          </select>

          <label for="Time slots"><b>Your time slots for this week</b></label>
          <select name="slots">
            <option value="0" <?php if ($rows['slots']==NULL){?> selected <?php }?>>Select time</option>
            <option value="slot1" <?php if ($rows['slots']=="slot1"){?> selected <?php }?>>12AM - 3AM</option>
            <option value="slot2" <?php if ($rows['slots']=="slot2"){?> selected <?php }?>>3AM - 6AM</option>
            <option value="slot3" <?php if ($rows['slots']=="slot3"){?> selected <?php }?>>6AM - 9AM</option>
            <option value="slot4" <?php if ($rows['slots']=="slot4"){?> selected <?php }?>>9AM - 12PM</option>
            <option value="slot5" <?php if ($rows['slots']=="slot5"){?> selected <?php }?>>12PM - 3PM</option>
            <option value="slot6" <?php if ($rows['slots']=="slot6"){?> selected <?php }?>>3PM - 6PM</option>
            <option value="slot7" <?php if ($rows['slots']=="slot7"){?> selected <?php }?>>6PM - 9PM</option>
            <option value="slot8" <?php if ($rows['slots']=="slot8"){?> selected <?php }?>>9PM - 12AM</option>
          </select>

          <button type="submit" class="signupbtn" name="reg_slots">Submit</button>
        </form>
    <?php }else{
    ?>  
        <form class="indexForm">
          <label for="Time slots"><b>Selected day of the week</b></label>
          <select name="day" disabled="disabled">
            <option value="0" <?php if ($rows['day']==NULL){?> selected <?php }?>>Select time</option>
            <option value="Sunday" <?php if ($rows['day']=="Sunday"){?> selected <?php }?>>Sunday</option>
            <option value="Monday" <?php if ($rows['day']=="Monday"){?> selected <?php }?>>Monday</option>
            <option value="Tuesday" <?php if ($rows['day']=="Tuesday"){?> selected <?php }?>>Tuesday</option>
            <option value="Wednesday" <?php if ($rows['day']=="Wednesday"){?> selected <?php }?>>Wednesday</option>
            <option value="Thursday" <?php if ($rows['day']=="Thursday"){?> selected <?php }?>>Thursday</option>
            <option value="Friday" <?php if ($rows['day']=="Friday"){?> selected <?php }?>>Friday</option>
            <option value="Saturday" <?php if ($rows['day']=="Saturday"){?> selected <?php }?>>Saturday</option>
          </select>

          <label for="Time slots"><b>Your time slots for this week</b></label>
          <select name="slots" disabled="disabled">
            <option value="0" <?php if ($rows['slots']==NULL){?> selected <?php }?>>Select time</option>
            <option value="slot1" <?php if ($rows['slots']=="slot1"){?> selected <?php }?>>12AM - 3AM</option>
            <option value="slot2" <?php if ($rows['slots']=="slot2"){?> selected <?php }?>>3AM - 6AM</option>
            <option value="slot3" <?php if ($rows['slots']=="slot3"){?> selected <?php }?>>6AM - 9AM</option>
            <option value="slot4" <?php if ($rows['slots']=="slot4"){?> selected <?php }?>>9AM - 12PM</option>
            <option value="slot5" <?php if ($rows['slots']=="slot5"){?> selected <?php }?>>12PM - 3PM</option>
            <option value="slot6" <?php if ($rows['slots']=="slot6"){?> selected <?php }?>>3PM - 6PM</option>
            <option value="slot7" <?php if ($rows['slots']=="slot7"){?> selected <?php }?>>6PM - 9PM</option>
            <option value="slot8" <?php if ($rows['slots']=="slot8"){?> selected <?php }?>>9PM - 12AM</option>
          </select>
        </form>
      <?php
          }  
        }?>
    <?php endif ?>
</div>
		
</body>
</html>