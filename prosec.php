<?php


$mysqli = new mysqli('localhost','root','','links') or die(mysqli_error($mysqli));

$id = 0;
$update=false;
$name='';
$email='';
$contact='';
$date_time='';
$reason='';


if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $mysqli->query("DELETE from request WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location:index.php");
}

if(isset($_POST['save']))
{
    $event_dt = $_POST['event_dt'];
    $name = $_POST['name'];

    $mysqli->query("INSERT into time_date (event_dt,name) values ('$event_dt','$name')") or
    die($mysqli->error);


    header("location:time.php");
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

if(isset($_GET['insert']))
{
    $id=$_GET['insert'];
    $mysqli->query("INSERT INTO request (name, email, contact, date_time, reason) SELECT name, email, contact, date_time, reason FROM appoinment WHERE id = $id") or die($mysqli->error);

    header("location:index.php");
}

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $mysqli->query("DELETE from appoinment WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location:history.php");
}

if(isset($_GET['remove']))
{
    $id=$_GET['remove'];
    $mysqli->query("DELETE from appoinment WHERE id=$id") or die($mysqli->error);

    
    header("location:index.php");
}

if(isset($_GET['deleteRec']))
{
    $id=$_GET['deleteRec'];
    $mysqli->query("DELETE from request WHERE id=$id") or die($mysqli->error);

    
    header("location:index.php");
}
?>