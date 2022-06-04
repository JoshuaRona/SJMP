<?php


$mysqli = new mysqli('localhost','root','','links') or die(mysqli_error($mysqli));

$id = 0;
$update=false;
$date='';
$event='';
$name='';
$email='';
$contact='';
$date_time='';
$reason='';

if(isset($_POST['save']))
{
    $date = $_POST['date'];
    $event = $_POST['event'];

    $mysqli->query("INSERT into data (date,event) values ('$date','$event')") or
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location:history.php");
}

if(isset($_POST['send']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $date_time = $_POST['date_time'];
    $reason = $_POST['reason'];

    $mysqli->query("INSERT into appoinment (name, email, contact, date_time, reason) values ('$name','$email','$contact','$date_time','$reason')") or
    die($mysqli->error);

    header("location:success.php");
}

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $mysqli->query("DELETE from data WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location:history.php");
}


if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * from data WHERE id=$id") or die($mysqli->error);
    
    
        $row=$result->fetch_array();
        $date=$row['date'];
        $event=$row['event'];
    
}

if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $date=$_POST['date'];
    $event=$_POST['event'];

    $mysqli->query("UPDATE data SET date='$date', event='$event' WHERE id=$id") or die ($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "Warning";

    header("location:history.php");
}

if(isset($_GET['remove']))
{
    $id=$_GET['remove'];
    $mysqli->query("DELETE from appoinment WHERE id=$id") or die($mysqli->error);

    
    header("location:admin.php");
}

if(isset($_GET['insert']))
{
    $id=$_GET['insert'];
    $mysqli->query("INSERT INTO request (name, email, contact, date_time, reason) SELECT name, email, contact, date_time, reason FROM appoinment WHERE id = $id") or die($mysqli->error);

    
    header("location:admin.php");
}
?>