<?php
require('../model/database.php');
require('../model/room_db.php');
require('../model/Roomcategory_db.php');





$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_Room';
    }
}

if ($action == 'list_Room') {
    // Get the current category ID
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    
    // Get product and category data
    $category_room = get_category_room($category_id);
    $roomcategories = get_categories();
    $rooms = get_rooms_by_category($category_id);

    // Display the product list
    include('Room_list.php');
} else if ($action == 'show_edit_form') {
    $room_id = filter_input(INPUT_POST, 'room_id', 
            FILTER_VALIDATE_INT);
    if ($room_id == NULL || $room_id == FALSE) {
        $error = "Missing or incorrect room id.";
        include('../errors/error.php');
    } else { 
        $room = get_room($room_id);
        include('Room_edit.php');
    }
} else if ($action == 'update_room') {
    $room_id = filter_input(INPUT_POST, 'room_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $Rnum = filter_input(INPUT_POST, 'Rnum');
    $Rname = filter_input(INPUT_POST, 'Rname');
    $Drate = filter_input(INPUT_POST, 'Drate');

    // Validate the inputs
    if ($room_id == NULL || $room_id == FALSE || $category_id == NULL || 
            $category_id == FALSE || $Rnum == NULL || $Rname == NULL || 
            $Drate == NULL ) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_room($room_id, $category_id, $Rnum, $Rname, $Drate);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'delete_room') {
    $room_id = filter_input(INPUT_POST, 'room_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $room_id == NULL || $room_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_room($room_id);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $roomcategories = get_categories();
    include('Room_add.php');
} else if ($action == 'add_room') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $Rnum = filter_input(INPUT_POST, 'Rnum');
    $Rname = filter_input(INPUT_POST, 'Rname');
    $Drate = filter_input(INPUT_POST, 'Drate');
    if ($category_id == NULL || $category_id == FALSE || $Rnum == NULL || 
            $Rname == NULL || $Drate == NULL) {
        $error = "Invalid room data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_room($category_id, $Rnum, $Rname, $Drate);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_Roomcategory') {
    $roomcategories = get_categories();
    include('Roomcategory_list.php');
} else if ($action == 'add_category') {
    $Cname = filter_input(INPUT_POST, 'Cname');

    // Validate inputs
    if ($Cname == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_category($Cname);
        header('Location: .?action=list_Roomcategory');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_Roomcategory');      // display the Category List page
}
?>