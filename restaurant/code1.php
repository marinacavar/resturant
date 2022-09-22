<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM orders WHERE id_orders='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Order Deleted Successfully";
        header("Location: index1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Order Not Deleted";
        header("Location: index1.php");
        exit(0);
    }
}

if(isset($_POST['update_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['id_orders']);

    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $ord_date = mysqli_real_escape_string($con, $_POST['ord_date']);
    $ord_time = mysqli_real_escape_string($con, $_POST['ord_time']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $total = mysqli_real_escape_string($con, $_POST['total']);

    $query = "UPDATE orders SET  email='$email', ord_date='$ord_date', ord_time='$ord_time', quantity='$quantity', 'total='$total' WHERE id_orders='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Order Updated Successfully";
        header("Location: index1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Order Not Updated";
        header("Location: index1.php");
        exit(0);
    }

}


if(isset($_POST['save_customer']))
{
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $ord_date = mysqli_real_escape_string($con, $_POST['ord_date']);
    $ord_time = mysqli_real_escape_string($con, $_POST['ord_time']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $total = mysqli_real_escape_string($con, $_POST['total']);

    $query = "INSERT INTO orders (email,ord_date,ord_time,quantity,total) VALUES ('$email','$ord_date','$ord_time','$quantity','$total')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Order Created Successfully";
        header("Location: order-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Order Not Created";
        header("Location: order-create.php");
        exit(0);
    }
}

?>