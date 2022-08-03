<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "tts_db");
mysqli_select_db($connect, 'tts_db');

    $id = $_GET['request'];
    $query = "DELETE FROM theatre_tbl WHERE play_id='$id'";
    $query_run = mysqli_query($connect, $query);

    if($query_run)
    {
        echo '<script> alert("Title Deleted"); </script>';
        echo "<script>window.location.href='dashboard.php'</script>";
    }
    else
    {
        echo '<script> alert("Title Not Deleted"); </script>';
        echo "<script>window.location.href='dashboard.php'</script>";
        
    }

?>