<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Fredoka Font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
	<!--Raleway Font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet">
	<!--Nanum Gothic Font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
	.bg-image{
		background-image: url('./bgPic2.jpg');
        background-size: cover;
		background-repeat: no-repeat;
		height: 100vh;
        filter: blur(5px);
	}
    .section{
		position: absolute;
		transform: translate(-50%, -50%);
		top: 50%;
		left: 50%;
	}
	h1{
		font-family: 'Raleway', sans-serif;
	}
	.container{
		width: 375px;
		height: max-content;
		background: rgba(0, 0, 0, 0.8);
		color: white;
		border-radius: 10px;
		padding-top: 5px;
		text-align: center;
    }
	h3{
		font-family: 'Nanum Gothic', sans-serif;
        font-size: 26px;
        color: #00ff8c;
	}
    h2{
        font-size: 90px;
    }
    a .button{
        background-color: white; /* Green */
  border: none;
  color: white;
  padding: 14px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 17px;
  font-weight: bold;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
    }
    a .button2 {
  background-color: #4CAF50; 
  color: white; 
  border: 2px solid white;
  border-radius: 10px;
}

a .button2:hover {
  background-color: white;
  color: #4CAF50;
}
    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 14px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 17px;
  font-weight: bold;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button1 {
  background-color: white; 
  color: #4CAF50; 
  border: 2px solid #4CAF50;
  border-radius: 10px;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
input{
    font-family: 'Raleway', sans-serif;
    font-size: 15px;
    width: 90%;
    margin: 3px;
    background-color: lightblue;
    border: none;
}
.container .box{
    width: 375px;
		height: 240px;
        position: absolute;
        transform: translate(-50%, -50%);
		top: 50%;
		left: 50%;
        background: rgba(0, 0, 0, 0.1);
    }
</style>
<body>
<div class="bg-image"></div>
<div class="section">

	<div class="container">
    <div class="box"></div>
	<h1>Confirm Your Appoinment Schedules.</h1>
    <h2><i class='bx bx-check-circle' style='color:#00ff8c'  ></i></h2>
    <form action="https://formspree.io/f/xoqrrkby" method="POST">
            <input type="text" name="name" value="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from appoinment ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['name'];
            }
        }?>" ><br>
            <input type="email" name="email" value="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from appoinment ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['email'];
            }
        }?>" ><br>
        <input type="text" name="contact" value="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from appoinment ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['contact'];
            }
        }?>" ><br>
                <input type="text" name="date_time" value="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from appoinment ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['date_time'];
            }
        }?>" ><br>
            <textarea name="reason" style="resize: none; margin: 6px; border:none; background-color:lightblue; font-weight:bold;" cols="44" rows="8" ><?php include 'db_connectionLinks.php';
        $sql = "SELECT * from appoinment ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['reason'];
            }
        }?></textarea><br>
        
            <button class="button button1" type="submit">Send</button>
            
        </form>
        <label style="font-family: 'Nanum Gothic', sans-serif;">(Make sure to click the send button for the confirming of data before clicking <span style="color: green;">YES</span> this or else we wont receive your message via email.)<br>
YES</label>
<input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"/>
<br>
<div id="ifYes" style="display:none">
<a href="index.php"><button class="button button2">Go back</button></a>
</div>
<label style="font-family: 'Raleway', sans-serif;">Are you sure you already click the send button?</label>
<script>
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
}
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
        
    } 
    
}
</script>
	</div>
</div>

        
</body>
</html>