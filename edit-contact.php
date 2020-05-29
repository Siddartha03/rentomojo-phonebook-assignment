<!-- Add new contact details -->
<?php
//Form validations
//Fetch values from the form
include "dbconnection.php";
if(isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$q = "select * from phonebook where id=$id";
	$res = $conn->query($q);
	$row = $res->fetch_assoc();
	$row_name = $row['name'];
	$row_dob = $row['dob'];
	$row_mobile = $row['mobile'];
	$row_email = $row['email'];
}
$error = array("name"=>"","dob"=>"","mobile"=>"","mobile2"=>"","mobile3"=>"","email"=>"","email2"=>"","email3"=>"");
$name=$dob=$mobile=$email="";
$mobile2=$mobile3=$email2=$email3="--";

if(isset($_POST['update'])) {
	$id = $_GET['edit'];

	$name = $_POST['name'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	
    if(empty($name)){
		$error['name'] = "Name can't be blank!!<br>";
      }
      else if(!preg_match('/^[A-Za-z ]+$/',$name)) {
          $error['name'] = "Name can contain alphabets and spaces only!";
		}else if(empty($dob)){
			$error['dob'] = "DOB can't be blank!!";
		}
		else if(empty($mobile)){
			$error['mobile'] = "Mobile can't be blank!!";
		  }
		  else if(!preg_match("/^[0-9]{10}$/",$mobile)) {
			  $error['mobile'] = "Mobile number should be 10 digit number!";
			}else if(empty($email)){
        		$error['email'] = "Email can't be blank!!";
      	}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          $error['email'] = "Email has to be a valid email address!";
        }else if($row_name==$name && $row_dob==$dob && $row_mobile==$mobile && $row_email==$email) {
			echo '<script>alert("Nothing is updated!")</script>';
			echo "<script>window.location.href='home.php';</script>";
		}else {
			$q = "update phonebook set name='$name', dob='$dob', mobile='$mobile', email='$email' where id=$id";
			if($conn->query($q)) {
				echo '<script>alert("Successfully updated!")</script>';
				echo "<script>window.location.href='home.php';</script>";
				exit;
		}
	  }
	}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="add-contact.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>RENTOMOJO</title>
<script type="text/javascript">
//Add mobile number input field
$(document).ready(function() {
	var max_fields = 2; //maximum input boxes allowed
	var wrapper = $(".input_fields_wrap"); //Fields wrapper
	var add_button = $("#ar1"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		var mobile = $('.a2').val();
		if(mobile=='')
		{
			alert("Please enter mobile number!");
		}else {
		if(x <= max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><input type="text" class="a2" placeholder="+91 xxxxxxxxx" name="mobile"/><a href="#" class="remove_field"><i class="fa fa-times" aria-hidden="true"></i></a></div><div class="text_color"><?php echo $error['mobile2'] ?></div><br>'); //add input box
		}else{
			alert("You can't enter more than 3 mobile numbers!");
		}
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});

$(document).ready(function() {
	var max_fields_email = 2; //maximum input boxes allowed
	var wrapper_email = $(".input_fields_email"); //Fields wrapper
	var add_button_email = $("#email"); //Add button ID
	
	var s= 1; //initlal text box count
	$(add_button_email).click(function(e){ //on add input button click
		e.preventDefault();
		var email = $('.add_email').val();
		if(email=='')
		{
			alert("Please enter your Email!");
		}else {
		if(s <= max_fields_email){ //max input box allowed
			s++; //text box increment
			$(wrapper_email).append('<div><input type="email" name="email" placeholder="abc@gmail.com" class="add_email"/><a href="#" class="remove_field_email"><i class="fa fa-times" aria-hidden="true"></i></a></div><div class="text_color"><?php echo $error['email'] ?></div><br>'); //add input box
		}else{
			alert("You can't enter more than 3 Email addresses!");
		}
		}
	});
	
	$(wrapper_email).on("click",".remove_field_email", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); s--;
	})
});
</script>
</head>
<body>
<form action="edit-contact.php?edit=<?php echo $_GET['edit'] ?>" method="POST">
	<div id="add">
		<p id="h"><b>RM-PHONEBOOK</b></p>
	<div id="add1">
		<i class="fa fa-arrow-left" id="ar"></i><?php echo " Add new contact"?><br><br>
		<?php echo "Name"?><br><br>
		<input type="text" name="name" placeholder="Name" class="a1" value="<?php echo $row['name'] ?>">
		<div class="text_color"><?php echo $error['name'] ?></div><br><br>
		
		<?php echo"DOB"?><br>
		<input type="text" name="dob" placeholder="dd/mm/yyyy" onfocus="(this.type='date')" class="a1" value="<?php echo $row['dob'] ?>">
		<div class="text_color"><?php echo $error['dob'] ?></div><br><br>
		
		<?php echo "Mobile Number" ?> <br>
		<div class="input_fields_wrap">
			<input type="number" min="10" name="mobile" placeholder="+91 xxxxxxxxx" class="a2" value="<?php echo $row['mobile'] ?>">
			<i class="fa fa-plus-circle" id="ar1"></i>
			<div class="text_color"><?php echo $error['mobile'] ?></div><br><br>
		</div>
		<?php echo "Email"?><br>
		<div class="input_fields_email">
			<input type="email" name="email" placeholder="abc@gmail.com" class="add_email" value="<?php echo $row['email'] ?>">
			<i class="fa fa-plus-circle" id="email"></i>
			<div class="text_color"><?php echo $error['email'] ?></div><br>
		</div>
		<input type="submit" name="update" value="Save" class="a3"><br><br>
	</div>	
	</div>
</form>
</body>
</html>