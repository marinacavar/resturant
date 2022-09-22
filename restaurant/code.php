<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM customer WHERE cust_id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: index2.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: index2.php");
        exit(0);
    }
}

if(isset($_POST['update_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['customer_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "UPDATE customer SET name='$name', email='$email', phone='$phone', address='$address', password='$password' WHERE cust_id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Updated Successfully";
        header("Location: index2.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Updated";
        header("Location: index2.php");
        exit(0);
    }

}


if(isset($_POST['save_customer']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO customer (name,email,phone,address,password) VALUES ('$name','$email','$phone','$address','$password')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Customer Created Successfully";
        header("Location: customer-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Created";
        header("Location: customer-create.php");
        exit(0);
    }
}

?>