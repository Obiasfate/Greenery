<?php
    include 'includes/dbh.inc.php';

    session_start();

    $nameTemp = '';
    $emailTemp = '';
    $contactNumberTemp = '';
    $schoolNameTemp = '';
    $messageTemp = '';

    if(isset($_POST['add']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contactNumber = $_POST['contactnumber'];
        $schoolName = $_POST['schoolname'];
        $message = $_POST['message'];

        $sql = ("INSERT INTO `main`(`name`, `email`, `contactnumber`, `schoolname`, `message`) VALUES ('$name',' $email','$contactNumber','$schoolName','$message') ") or die($mysqli->error);

        if (mysqli_query($conn, $sql))
        {
            $_SESSION['notif'] = "New record created successfully!";
            $_SESSION['messageType'] = "success";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }        
        mysqli_close($conn);
        header("Location:tables.php");
    }


    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $sql = "DELETE FROM `contact_info` WHERE id = $id" or die($mysqli->error);
        
        if (mysqli_query($conn, $sql))
        {
            $_SESSION['notif'] = "Record deleted successfully!";
            $_SESSION['messageType'] = "danger";
        }
        else
        {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        header("Location:tables.php");
    }


    if(isset($_GET['edit']))
    {
        $id = $_GET['edit'];
        $sql = "SELECT * FROM `main` WHERE id = $id" or die($mysqli->error);
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $row = $result->fetch_array();
            $nameTemp = $row['name'];
            $emailTemp = $row['email'];
            $contactNumberTemp = $row['contactnumber'];
            $schoolNameTemp = $row['schoolname'];
            $messageTemp = $row['message'];
        }
    }


    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contactNumber = $_POST['contactnumber'];
        $schoolName = $_POST['schoolname'];
        $message = $_POST['message'];

        $sql = ("UPDATE `main` SET `name`='$name',`email`='$email',`contactnumber`='$contactNumber',`schoolname`='$schoolName',`message`='$message' WHERE `id` = $id") or die($mysqli->error);

        if (mysqli_query($conn, $sql))
        {
            $_SESSION['notif'] = "Record updated successfully!";
            $_SESSION['messageType'] = "info";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }        
        mysqli_close($conn);
        header("Location:tables.php");
    }

?>