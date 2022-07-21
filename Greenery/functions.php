<?php
    include 'includes/dbh.inc.php';

    session_start();

    $nameTemp = '';
    $emailTemp = '';
    $phoneNumberTemp = '';
    $companyNameTemp = '';
    $projectTemp = '';
    $messageTemp = '';

    if(isset($_POST['add']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone'];
        $companyName = $_POST['company'];
        $project = $_POST['project'];
        $message = $_POST['message'];

        $sql = ("INSERT INTO `contact_info`(`contact_name`, `contact_email`, `contact_num`, `contact_company`, `contact_project`, `Message`) VALUES ('$name',' $email','$phoneNumber','$companyName','$project','$message') ") or die($mysqli->error);

        if (mysqli_query($conn, $sql))
        {
            
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        header('Location: contact-dashboard.php');
    }


    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $sql = "DELETE FROM `contact_info` WHERE contact_id = $id" or die($mysqli->error);
        
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
        header("Location:contact-dashboard.php");
    }


    if(isset($_GET['edit']))
    {
        $id = $_GET['edit'];
        $sql = "SELECT * FROM `contact_info` WHERE contact_id = $id" or die($mysqli->error);
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $row = $result->fetch_array();
            $nameTemp = $row['contact_name'];
            $emailTemp = $row['contact_email'];
            $phoneNumberTemp = $row['contact_num'];
            $companyNameTemp = $row['contact_company'];
            $projectTemp = $row['contact_project'];
            $messageTemp = $row['Message'];
        }
    }


    if(isset($_POST['update']))
    {
        $id = $_POST['contact_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone'];
        $companyName = $_POST['company'];
        $project = $_POST['project'];
        $message = $_POST['message'];

        $sql = ("UPDATE `contact_info` SET `contact_name`='$name',`contact_email`='$email',`contact_num`='$phoneNumber',`contact_company`='$companyName',`contact_project`='$project',`Message`='$message' WHERE `contact_id` = $id") or die($mysqli->error);

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
        header("Location:contact-dashboard.php");
    }

?>