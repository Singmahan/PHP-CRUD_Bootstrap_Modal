<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","php-crud-model");

    if(isset($_POST['save_student'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $class = $_POST['class'];
        $section = $_POST['section'];

        $query = "INSERT INTO students (fname,lname,class,section) VALUES ('$fname','$lname','$class','$section')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            $_SESSION['status'] = "Successfully Saved";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Not Saved";
            header("Location: index.php");
        }
    }

    // view data jquery
    if(isset($_POST['Checking_viewbtn'])){
        $s_id =  $_POST['student_id'];
        // echo $return = $s_id;

        $query = "SELECT * FROM students WHERE id='$s_id'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0){
            while($row = mysqli_fetch_array($query_run))
            {
                echo $return = '
                    <h5> ID : '.$row['id'].'</h5>
                    <h5> First Name : '.$row['fname'].'</h5>
                    <h5> Last Name : '.$row['lname'].'</h5>
                    <h5> Class : '.$row['class'].'</h5>
                    <h5> Section : '.$row['section'].'</h5>
                ';
            }
        }else{
            echo $return = "<h5>No Record Found</h5>";
        }

    }

    // edit data 
    if(isset($_POST['Checking_edit_btn'])){
        $s_id =  $_POST['student_id'];
        // echo $return = $s_id;
        $result_array = [];

        $query = "SELECT * FROM students WHERE id='$s_id'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0){
            while($row = mysqli_fetch_array($query_run))
            {
                array_push($result_array, $row);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }else{
            echo $return = "<h5>No Record Found</h5>";
        }

    }

    // Update Data 
    if(isset($_POST['update_student'])){
        $id = $_POST['edit_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $class = $_POST['class'];
        $section = $_POST['section'];

        $query = "UPDATE students SET fname='$fname',lname='$lname',class='$class',section='$section' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            $_SESSION['status'] = "Successfully Updated";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Someting went Wrong.!";
            header("Location: index.php");
        }
    }

    // delete data 
    if(isset($_POST['delete_student'])){
        $id = $_POST['student_id'];

        $query = "DELETE FROM students WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            $_SESSION['status'] = "Successfully Deleted";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Someting went Wrong.!";
            header("Location: index.php");
        }
    }

?>