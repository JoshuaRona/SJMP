<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styleAct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bx-church'></i>
                <div class="logo_name">SJMP</div>
            </div>
        </div>
        <ul class="nav_list" id="nav_list">
            <li>
                <a href="#" class="btn" id="home">
                    <i class='bx bx-home-alt-2' ></i>
                    <span class="links_name">Home</span>
                </a>
            </li>
            <li>
                <a href="#" class="btn" id="schedules">
                    <i class='bx bx-calendar'></i>
                    <span class="links_name">Schedules</span>
                </a>
            </li>
            <li>
                <a href="#" class="btn active" id="activities">
                    <i class='bx bx-notepad'></i>
                    <span class="links_name">Activities</span>
                </a>
            </li>
            <li>
                <a href="#" class="btn" id="history">
                    <i class='bx bx-note'></i>
                    <span class="links_name">History</span>
                </a>
            </li>
            <li>
                <a href="#" class="btn" id="about">
                    <i class='bx bx-bookmarks'></i>
                    <span class="links_name">About</span>
                </a>
            </li>
            <li>
                <a href="SJMPWebsite.php" class="btn" id="about">
                <i class='bx bx-right-arrow-alt'></i>
                    <span class="links_name">Go to site</span>
                </a>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                <i class='bx bxs-user'></i>
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['user'];?></div>
                        <div class="job">Web Designer</div>
                    </div>
                </div>
                <a href="logout.php"><i class='bx bx-log-out-circle' id="log_out"></i></a>
            </div>
        </div>
    </div>
    
    <div class="home_content">
        
        <div class="container" style="overflow: scroll;">
        <?php
    include 'db_connection.php';
    $result = $conn->query("SELECT * from appoinment") or die($mysqli->error);
    ?>
        <table class="home-table" border="1px" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Date & Time</th>
                    <th>Reason</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['contact']; ?></td>
        <td><?php echo $row['date_time']; ?></td>
        <td><?php echo $row['reason']; ?></td>
        <td>
            <a href="process.php?remove=<?php echo $row['id']; ?>" class="btn">Delete</a>
        </td>
    </tr>
    <?php endwhile;?>
        </table>
    </div>

        </div>
    </div>
    <div class="schedules_content">
        <div class="container">
        <form method="POST">
        <fieldset>
            <legend>Office Schedule</legend>
            <input type="text" name="office" id="office" >
            <button type="submit" name="submit" id="submit">Update</button>
        </fieldset>
        <fieldset>
            <legend>Mass Schedule</legend>
            <input type="text" name="mass" id="mass">
            <button type="submit" name="update" id="update">Update</button>
        </fieldset>
        <div class="updated">UPDATED SCHEDULES 
        <textarea cols="113" rows="1" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Office Schedule: <?php 
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
    ?></textarea>
    <textarea cols="113" rows="1" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Mass Schedule: <?php 
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
    ?></textarea>
        </div>
        </div>  
        </form>      
        
    </div>
    <?php
    include 'db_connection.php';
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['office']))
        {
            $office=$_POST['office'];

            $sql="UPDATE form SET office='$office' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                
                header ('Location: schedule.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connection.php';
    if(isset($_POST['update']))
    {
        if(!empty($_POST['mass']))
        {
            $mass=$_POST['mass'];

            $sql="UPDATE form SET mass='$mass' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: schedule.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connectionLinks.php';
    if(isset($_POST['savingfb']))
    {
        
        if(!empty($_POST['fb']))
        {
            $fb=$_POST['fb'];

            $sql="UPDATE linked SET fb='$fb' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: about.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connectionLinks.php';
    if(isset($_POST['savinginsta']))
    {
        
        if(!empty($_POST['insta']))
        {
            $insta=$_POST['insta'];

            $sql="UPDATE linked SET insta='$insta' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: about.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connectionLinks.php';
    if(isset($_POST['savingyt']))
    {
        
        if(!empty($_POST['yt']))
        {
            $yt=$_POST['yt'];

            $sql="UPDATE linked SET yt='$yt' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: about.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connectionLinks.php';
    if(isset($_POST['savingtele']))
    {
        
        if(!empty($_POST['tele']))
        {
            $tele=$_POST['tele'];

            $sql="UPDATE contacts SET tele='$tele' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: about.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connectionLinks.php';
    if(isset($_POST['savingmobil']))
    {
        
        if(!empty($_POST['mobil']))
        {
            $mobil=$_POST['mobil'];

            $sql="UPDATE contacts SET mobil='$mobil' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: about.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connectionLinks.php';
    if(isset($_POST['savingprev']))
    {
        
        if(!empty($_POST['prev']))
        {
            $prev=$_POST['prev'];

            $sql="UPDATE events SET prev='$prev' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: activities.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connectionLinks.php';
    if(isset($_POST['savingtoday']))
    {
        
        if(!empty($_POST['today']))
        {
            $today=$_POST['today'];

            $sql="UPDATE events SET today='$today' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: activities.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    include 'db_connectionLinks.php';
    if(isset($_POST['savingupco']))
    {
        
        if(!empty($_POST['upco']))
        {
            $upco=$_POST['upco'];

            $sql="UPDATE events SET upco='$upco' WHERE id=1";
            $result=mysqli_query($conn,$sql);
        

            if($result)
            {
                header ('Location: activities.php');
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        else
        {
            $alert = "<script>alert('Fill first');</script>";
            echo $alert;
        }
    
    }
    

    ?>
    
    <div class="activities_content">
        <div class="container">
        <form method="POST">
        <fieldset>
                <legend>Events</legend>
                <label>Previous Events</label><br>
                <input type="text" name="prev" id="prevEve">
                <button type="submit" name="savingprev" id="savingprev">Update</button><br>
                <label>Happening Today</label><br>
                <input type="text" name="today" id="today">
                <button type="submit" name="savingtoday" id="savingtoday">Update</button><br>
                <label>Upcoming Events</label><br>
                <input type="text" name="upco" id="upcoEve">
                <button type="submit" name="savingupco" id="savingupco">Update</button>
            </fieldset>
            <div class="updated">Updated Events<br>
            <textarea cols="36" rows="10" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Previous Events: <?php 
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
        ?></textarea>
        <textarea cols="36" rows="10" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Happening Today: <?php 
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
        ?></textarea>
        <textarea cols="36" rows="10" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Previous Events: <?php 
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
        ?></textarea>
            </div>
        </form>
        </div>
    </div>
    <div class="history_content">
        
        <?php 
    require_once 'process.php';
    ?>

    <?php
    if(isset($_SESSION['message'])):
    ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    
    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
    </div>

    <?php
    endif
    ?>

    <div class="container" style="overflow: scroll;">
    <?php
    $mysqli = new mysqli('localhost','root','','links') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * from data") or die($mysqli->error);
    ?>
<div class="row">
    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
        <label>Date/Year</label>
        <input type="date" name="date" id="name" class="form-control" value="<?php echo $date;?>" placeholder="Enter date/year">
        </div>
        <div class="form-group">
        <label>Event</label>
        <input type="text" name="event" id="location" class="form-control" value="<?php echo $event;?>" placeholder="Enter event" disabled>
        </div>
        <div class="form-group">
        <?php
        if($update==true):
        ?>
        <button type="submit" class="btn" name="update">Update</button>
        <?php
        else:
        ?>
        <button type="submit" class="btn btn-success" name="save" id="save" disabled>Save</button>
        <?php
        endif;
        ?>
        </div>
    </form>
    </div>
    <div class="row">
        <table class="table" border="1px" cellspacing="0">
            <thead>
                <tr>
                    <th>Date/Year</th>
                    <th>Event</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['event']; ?></td>
        <td>
            <a href="history.php?edit=<?php echo $row['id']; ?>" class="btn">Edit</a>
            <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn">Delete</a>
        </td>
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
    
    <div class="about_content">
        <div class="container">
            <form method="POST">
            <fieldset>
                <legend>Contact Details</legend>
                <label>Telephone Number: </label>
                <input type="text" name="tele" id="tele" onkeypress="isInputNumber(event)" value="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from contacts;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['tele'];
            }
        }?>">
                <button type="submit" name="savingtele" class="btns" id="savingtele">Update</button><br>
                <label>Mobile Number: </label>
                63<input type="text" name="mobil" id="mobil" maxlength="10" onkeypress="isInputNumber(event)" value="<?php include 'db_connectionLinks.php';
        $sql = "SELECT * from contacts;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['mobil'];
            }
        }?>">
                <button type="submit" name="savingmobil" id="savingmobil">Update</button>
            </fieldset>
            <fieldset>
                <legend>Social Media Links</legend>
                <label>Facebook</label>
                <input type="text" name="fb" id="fb">
                <button type="submit" name="savingfb" id="savingfb">Update</button><br>
                <label>Instagram</label>
                <input type="text" name="insta" id="insta">
                <button type="submit" name="savinginsta" id="savinginsta">Update</button><br>
                <label>Youtube</label>
                <input type="text" name="yt" id="yt">
                <button type="submit" name="savingyt" id="savingyt">Update</button>
            </fieldset>
            <div class="updated">Updated numbers & links
            <textarea cols="113" rows="1" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Telephone Number: <?php 
        include 'db_connectionLinks.php';
        $sql = "SELECT * from contacts;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['tele'];
            }
        }
        ?></textarea>
        <textarea cols="113" rows="1" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Mobile Number: 63<?php 
        include 'db_connectionLinks.php';
        $sql = "SELECT * from contacts;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['mobil'];
            }
        }
        ?></textarea>
            <textarea cols="113" rows="1" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Facebook Link: <?php 
        include 'db_connectionLinks.php';
        $sql = "SELECT * from linked;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['fb'];
            }
        }
        ?></textarea>
        <textarea cols="113" rows="1" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Instagram Link: <?php 
        include 'db_connectionLinks.php';
        $sql = "SELECT * from linked;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['insta'];
            }
        }
        ?></textarea>
        <textarea cols="113" rows="1" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" disabled>Youtube Link: <?php 
        include 'db_connectionLinks.php';
        $sql = "SELECT * from linked;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['yt'];
            }
        }
        ?></textarea>
        
            </div>
            </div>
            </form>
        
    </div>
   
    <script>
        
        var btnContainer = document.getElementById("nav_list");
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

        const btnhome = document.querySelector('#home');
        const hmpg = document.querySelector('.home_content');
        const btsched = document.querySelector('#schedules');
        const sched = document.querySelector('.schedules_content');
        const btnact = document.querySelector('#activities');
        const act = document.querySelector('.activities_content');
        const bthist = document.querySelector('#history');
        const hist = document.querySelector('.history_content');
        const btnabt = document.querySelector('#about');
        const abt = document.querySelector('.about_content');

        btnhome.addEventListener('click', () =>{
        hmpg.style.display = 'flex';
        sched.style.display = 'none';
        act.style.display = 'none';
        hist.style.display = 'none';
        abt.style.display = 'none';
        })
        btsched.addEventListener('click', () =>{
        sched.style.display = 'flex';
        hmpg.style.display = 'none';
        act.style.display = 'none';
        hist.style.display = 'none';
        abt.style.display = 'none';
        })
        btnact.addEventListener('click', () =>{
        act.style.display = 'flex';
        hmpg.style.display = 'none';
        sched.style.display = 'none';
        hist.style.display = 'none';
        abt.style.display = 'none';
        })
        bthist.addEventListener('click', () =>{
        hist.style.display = 'flex';
        hmpg.style.display = 'none';
        sched.style.display = 'none';
        act.style.display = 'none';
        abt.style.display = 'none';
        })
        btnabt.addEventListener('click', () =>{
        abt.style.display = 'flex';
        hmpg.style.display = 'none';
        sched.style.display = 'none';
        act.style.display = 'none';
        hist.style.display = 'none';
        })

        function auto_grow(element){
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }

        var input = document.getElementById("office");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("submit").click();
  }
});
var inputs = document.getElementById("mass");
inputs.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("update").click();
  }
});

function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
}

$(document).ready(function() {
    $('#name').on('input change', function() {
        if($(this).val() != '') {
            $('#location').prop('disabled', false);
        }
         else {
            $('#location').prop('disabled', true);
            $('#save').prop('disabled', true);
        }
    });
});
$(document).ready(function() {
    $('#location').on('input change', function() {
        if($(this).val() != '') {
            $('#save').prop('disabled', false);
        } else {
            $('#save').prop('disabled', true);
        }
    });
});
    </script>
</body>
</html>