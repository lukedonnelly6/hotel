<?php
function get_customers() {
    global $db;
    $query = 'SELECT * FROM customerdetails
              ORDER BY RoomID';
    $statement = $db->prepare($query);
    $statement->execute();
    $customerdetails = $statement->fetchAll();
    $statement->closeCursor();
    return $customerdetails;
}

function get_customer_by_room($customer_id) {
    global $db;
    $query = 'SELECT * FROM customerdetails
              WHERE customerdetails.customerID = :customer_id
              ORDER BY RoomID';
    $statement = $db->prepare($query);
    $statement->bindValue(":customer_id", $customer_id);
    $statement->execute();
    $customerdetails = $statement->fetchAll();
    $statement->closeCursor();
    return $customerdetails;
}

function get_customer($room_id) {
    global $db;
    $query = 'SELECT * FROM customerdetails
              WHERE RoomID = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":room_id", $room_id);
    $statement->execute();
    $customerdetail = $statement->fetch();
    $statement->closeCursor();
    return $customerdetail;
}

function delete_customer($room_id) {
    global $db;
    $query = 'DELETE FROM customerdetails
              WHERE RoomID = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':room_id', $room_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_customer($customer_id, $Cname, $pNumber, $rNum) {
    global $db;
    $query = 'INSERT INTO customerdetails
                 (customerID, customerName, phoneNumber, roomNum)
              VALUES
                 (:customer_id, :Cname, :pNumber, :rNum)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':Cname', $Cname);
    $statement->bindValue(':pNumber', $pNumber);
    $statement->bindValue(':rNum', $rNum);
    $statement->execute();
    $statement->closeCursor();
}

function update_customer($room_id, $customer_id, $Cname, $pNumber, $rNum) {
    global $db;
    $query = 'UPDATE customerdetails
              SET customerID = :customer_id,
                  customerName = :Cname,
                  phoneNumber = :pNumber,
                  roomNum = :rNum
               WHERE RoomID = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':Cname', $Cname);
    $statement->bindValue(':pNumber', $pNumber);
    $statement->bindValue(':rNum', $rNum);
    $statement->bindValue(':room_id', $room_id);
    $statement->execute();
    $statement->closeCursor();
}
?>