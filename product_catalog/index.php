<?php
require('../model/database.php');
require('../model/room_db.php');
require('../model/Roomcategory_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
} 

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $roomcategories = get_categories();
    $category_room = get_category_room($category_id);
    $rooms = get_rooms_by_category($category_id);

    include('Room_list.php');
} else if ($action == 'view_product') {
    $room_id = filter_input(INPUT_GET, 'room_id', 
            FILTER_VALIDATE_INT);   
    if ($room_id == NULL || $room_id == FALSE) {
        $error = 'Missing or incorrect product id.';
        include('../errors/error.php');
    } else {
        $roomcategories = get_categories();
        $room = get_room($room_id);

        // Get product data
        $Rnum = $room['roomNum'];
        $Rname = $room['roomName'];
        $Drate = $room['dalyRate'];

        // Calculate discounts
        $discount_percent = 30;  // 30% off for all web orders
        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Format the calculations
        $discount_amount_f = number_format($discount_amount, 2);
        $unit_price_f = number_format($unit_price, 2);

        // Get image URL and alternate text
        $image_filename = '../images/' . $code . '.png';
        $image_alt = 'Image: ' . $code . '.png';

        include('product_view.php');
    }
}
?>