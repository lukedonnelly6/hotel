<?php

require('../model/database.php');
require('../model/customerdate_db.php');
require('../model/customerdetails_db.php');

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../Registration/login.php");
    exit;
}


/**
 * Print out something that only logged in users can see.
 */


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_customer';
    }
}

if ($action == 'list_customer') {
    // Get the current category ID
    $customer_id = filter_input(INPUT_GET, 'customer_id', FILTER_VALIDATE_INT);
    if ($customer_id == NULL || $customer_id == FALSE) {
        $customer_id = 1;
    }

    // Get product and category data
    $customer_Date = get_customer_date($customer_id);
    $customerdates = get_dates();
    $customerdetails = get_customer_by_room($customer_id);

    // Display the product list
    include('customer_list.php');
} else if ($action == 'show_edit_form') {
    $room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
    if ($room_id == NULL || $room_id == FALSE) {
        $error = "Missing or incorrect room id.";
        include('../errors/error.php');
    } else {
        $customerdetail = get_customer($room_id);
        include('customer_edit.php');
    }
} else if ($action == 'update_customer') {
    $room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $Cname = filter_input(INPUT_POST, 'Cname');
    $pNumber = filter_input(INPUT_POST, 'pNumber', FILTER_VALIDATE_INT);
    $rNum = filter_input(INPUT_POST, 'rNum');

    // Validate the inputs
    if ($room_id == NULL || $room_id == FALSE || $customer_id == NULL ||
            $customer_id == FALSE || $Cname == NULL || $pNumber == NULL || $pNumber == FALSE ||
            $rNum == NULL ) {
        $error = "Invalid cusomer data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_customer($room_id, $customer_id, $Cname, $pNumber, $rNum);

        // Display the Product List page for the current category
        header("Location: .?customer_id=$customer_id");
    }
} else if ($action == 'delete_customer') {
    $room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    if ($customer_id == NULL || $customer_id == FALSE ||
            $room_id == NULL || $room_id == FALSE) {
        $error = "Missing or incorrect room id or customer id.";
        include('../errors/error.php');
    } else {
        delete_customer($room_id);
        header("Location: .?customer_id=$customer_id");
    }
} else if ($action == 'show_add_form') {
    $customerdates = get_dates();
    include('customer_add.php');
} else if ($action == 'add_customer') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $Cname = filter_input(INPUT_POST, 'Cname');
    $pNumber = filter_input(INPUT_POST, 'pNumber', FILTER_VALIDATE_INT);
    $rNum = filter_input(INPUT_POST, 'rNum');
    if ($customer_id == NULL ||
            $customer_id == FALSE || $Cname == NULL || $pNumber == NULL || $pNumber == FALSE ||
            $rNum == NULL ) {
        $error = "Invalid room data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_customer($customer_id, $Cname, $pNumber, $rNum) ;
        header("Location: .?customer_id=$customer_id");
    }
} else if ($action == 'list_customerdates') {
     $customerdates = get_dates();
    include('customerdates_list.php');
} else if ($action == 'add_date') {
    $Cdate = filter_input(INPUT_POST, 'Cdate');

    // Validate inputs
    if (Cdate == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_date($Cdate);
        header('Location: .?action=list_customerdates');  // display the Category List page
    }
} else if ($action == 'delete_date') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
   delete_date($customer_id);
    header('Location: .?action=list_customerdates');      // display the Category List page
}
?>