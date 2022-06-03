<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
</head>
<body>
  <div class="header">
      <img src="sjmpLogo.png" id="logo">
    <h1>SAN JOSE MANGGAGAWA PARISH</h1>
    <a href="https://www.google.com/maps/dir//3025+Molave+St,+Tondo,+Manila,+1013+Metro+Manila/@14.6314359,120.9760999,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3397b5e78f553809:0xb7f5deba5d6439be!2m2!1d120.9782886!2d14.6314359"><h4>3025 Molave Street, Manuguit, Tondo, Manila, Philippines</h4></a>
  </div>
  <div class="menu_wrapper" id="menu_wrapper">
    <div class="navbar" id="navbar">
      <li>
        <a class="btn active" id="home">Home</a>
        <a class="btn" id="oms">Office & Mass Schedules</a>
        <a class="btn" id="activities">Activities</a>
        <a class="btn" id="history">History</a>
        <a class="btn" id="about">About</a>
      </li>
  </div>
  <div class="homepage" id="homepage">
    <div class="container" >
          <button id="open">Schedule Your Appointment</button>
        <div class="modal-container" id="modal-container">
            <div class="modal">
              <h1>Appointment Schedule</h1>
              <form action="prosec.php" method="POST">
                <label>Fullname</label>
                <input type="text" name="name" placeholder="Enter your Fullname">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email in your gmail account">
                <label>Contact</label>
                <input type="text" name="contact" onkeypress="isInputNumber(event)" maxlength="11" placeholder="ex.09*********">
                <input type="datetime-local" name="date_time"><br>
<textarea name="reason" id="reason" cols="40" rows="8" maxlength="200" placeholder="Please indicate your appoinment intention..."></textarea>
<button type="submit" name="send" <?php include'process.php';?>>Send</button>

              </form>
              <button id="close">Close me</button>
            </div>
        </div>
    </div>
  </div>
  <div class="oms">
    <button class="tablink" onclick="openPage('Office', this, '#085E7D')" id="defaultOpen">Office Schedule(s)</button>
    <button class="tablink" onclick="openPage('Mass', this, '#008E89')">Mass Schedule(s)</button>

    <div id="Office" class="tabcont">
      <p><?php 
      include 'db_connection.php';
        $sql = "SELECT * from form;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['office'];
            }
        }
        ?></p>
    </div>

    <div id="Mass" class="tabcont">
    <p><?php 
      include 'db_connection.php';
        $sql = "SELECT * from form;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['mass'];
            }
        }
        ?></p>
    </div>

  </div>
  <div class="activities">
    <div class="hero">
      <div class="btn_box">
        <button id="btn1" onclick="openYesterday()"><i class="fa-solid fa-calendar"></i>PREVIOUS EVENTS</button>
        <button id="btn2" onclick="openToday()"><i class="fa-solid fa-list-check"></i>HAPPENING TODAY</button>
        <button id="btn3" onclick="openTomorrow()"><i class="fa-solid fa-clipboard-list"></i>UPCOMING EVENTS</button>
      </div>
       <div id="content1" class="content">
         <div class="content-left">
           <h1>Previous Events</h1>
           <p><?php 
        include 'db_connectionLinks.php';
        $sql = "SELECT * from events;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['prev'];
            }
        }
        ?></p>
         </div>
         <div class="content-right">
           <img src="yesterday.png">
         </div>
       </div>
       <div id="content2" class="content">
        <div class="content-left">
          <h1>Happening Today</h1>
          <p><?php 
        include 'db_connectionLinks.php';
        $sql = "SELECT * from events;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['today'];
            }
        }
        ?></p>
        </div>
        <div class="content-right">
          <img src="today.png">
        </div>
      </div>
      <div id="content3" class="content">
        <div class="content-left">
          <h1>Upcoming Events</h1>
          <p><?php 
        include 'db_connectionLinks.php';
        $sql = "SELECT * from events;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['upco'];
            }
        }
        ?></p>
        </div>
        <div class="content-right">
          <img src="tomorrow.png">
        </div>
      </div>
    </div>
  </div>
  <div class="history" style="overflow: scroll;">
        <div class="container">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Date/Year</th>
                    <th>Event</th>
                </tr>
            </thead>
            <?php 
    require_once 'process.php';
    ?>
    <?php
    $mysqli = new mysqli('sql203.epizy.com','epiz_31877959','pZT7TSITidY','epiz_31877959_sanjoseparish') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * from data") or die($mysqli->error);
    ?>
            <?php
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['event']; ?></td>
    </tr>
    <?php endwhile;?>
        </table>
    </div>

    <?php
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['event']; ?></td>
        <td></td>
    </tr>
    <?php endwhile;?>
    <?php
    function pre_r($array)
    {
        echo'<pre>';
        print_r($array);
        echo'</pre>';
    }
    ?>
        </div>
        </div>
    </div>

    <div class="clearfix"></div>
  </div>
  <div class="about">
    <div class="wrapper">
      <div class="button">
        <div class="icon">
          <a href="https://www.facebook.com/sanjosemanggagawaparishmanuguit"><i class="fa-brands fa-facebook"></i></a>
        </div>
      </div>
      <div class="button">
        <div class="icon">
          <a href="https://www.instagram.com/sanjosemanggagawaparish/"><i class="fa-brands fa-instagram-square"></i></a>
        </div>
    </div>
    <div class="button">
      <div class="icon">
        <a href="https://www.youtube.com/channel/UCUBNjjEaNkgoVHbXWWXy-Ww"><i class="fa-brands fa-youtube"></i></a>
      </div>
  </div>
  <div class="details">
    <p><b><u>Contact Details:</u></b></p>
    <p>Telephone Number: <?php include 'db_connectionLinks.php';
        $sql = "SELECT * from contacts;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['tele'];
            }
        }?></p>
    <p>Mobile Number: 63<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from contacts;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['mobil'];
            }
        }?></p>
    <p><b><u>Facebook Page</u></b></p>
    <p><a href="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from linked;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['fb'];
            }
        }?>">facebook.com/sanjosemanggagawaparishmanuguit</a></p>
    <p><b><u>Instagram Page</u></b></p>
    <p><a href="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from linked;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['insta'];
            }
        }?>">instagram.com/sanjosemanggagawaparish/</a></p>
    <p><b><u>Youtube Channel</u></b></p>
    <p><a href="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from linked;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['yt'];
            }
        }?>">San Jose Manggagawa Parish - Manuguit</a></p>
  </div>
  </div>
  
  <script>
    //navbar functions
    var btnContainer = document.getElementById("navbar");
    var btns = btnContainer.getElementsByClassName("btn");

    for(var i = 0; i<btns.length; i++)
    {
      btns[i].addEventListener('click', function()
      {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active");
        this.className += " active";
      })
    }
    
    //menu_wrapper functions
    const btnhome = document.querySelector('#home');
    const hmpg = document.querySelector('.homepage')
    const btnoms = document.querySelector('#oms');
    const oms = document.querySelector('.oms');
    const btnact = document.querySelector('#activities');
    const act = document.querySelector('.activities');
    const btnhtry = document.querySelector('#history');
    const htry = document.querySelector('.history');
    const btnabt = document.querySelector('#about');
    const abt = document.querySelector('.about');
   
    btnhome.addEventListener('click', () =>{
      hmpg.style.display = 'flex';
      act.style.display = 'none';
      oms.style.display = 'none';
      htry.style.display = 'none';
      abt.style.display = 'none';
    })
    btnoms.addEventListener('click', () =>{
      oms.style.display = 'inline-block';
      hmpg.style.display = 'none';
      act.style.display = 'none';
      htry.style.display = 'none';
      abt.style.display = 'none';
    })
    btnact.addEventListener('click', () =>{
      act.style.display = 'inline-block';
      hmpg.style.display = 'none';
      oms.style.display = 'none';
      htry.style.display = 'none';
      abt.style.display = 'none';
    })
    btnhtry.addEventListener('click', () =>{
      htry.style.display = 'flex';
      hmpg.style.display = 'none';
      oms.style.display = 'none';
      act.style.display = 'none';
      abt.style.display = 'none';
    })
    btnabt.addEventListener('click', () =>{
      abt.style.display = 'flex';
      hmpg.style.display = 'none';
      oms.style.display = 'none';
      act.style.display = 'none';
      htry.style.display = 'none';
    })

    //history function
    function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

//oms function
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcont");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

//activity function
var content1 = document.getElementById("content1");
var content2 = document.getElementById("content2");
var content3 = document.getElementById("content3");
var btn1 = document.getElementById("btn1");
var btn2 = document.getElementById("btn2");
var btn3 = document.getElementById("btn3");

function openYesterday(){
  content1.style.transform = "translateX(0)";
  content2.style.transform = "translateX(100%)";
  content3.style.transform = "translateX(100%)";
  btn1.style.color = "#001D6E";
  btn2.style.color = "#000";
  btn3.style.color = "#000";
}
function openToday(){
  content1.style.transform = "translateX(100%)";
  content2.style.transform = "translateX(0)";
  content3.style.transform = "translateX(100%)";
  btn2.style.color = "#006E7F";
  btn1.style.color = "#000";
  btn3.style.color = "#000";
}
function openTomorrow(){
  content1.style.transform = "translateX(100%)";
  content2.style.transform = "translateX(100%)";
  content3.style.transform = "translateX(0)";
  btn3.style.color = "#2A2550";
  btn2.style.color = "#000";
  btn1.style.color = "#000";
}

const open = document.getElementById('open');
const modal_container = document.getElementById('modal-container');
const close = document.getElementById('close');

open.addEventListener('click', () => {
  modal_container.classList.add('show');
});

close.addEventListener('click', () => {
  modal_container.classList.remove('show');
});

function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
}
  </script>
</body>
</html>