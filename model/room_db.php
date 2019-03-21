<?php
function get_rooms() {
    global $db;
    $query = 'SELECT * FROM rooms
              ORDER BY RoomID';
    $statement = $db->prepare($query);
    $statement->execute();
    $rooms = $statement->fetchAll();
    $statement->closeCursor();
    return $rooms;
}

function get_rooms_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM rooms
              WHERE rooms.categoryID = :category_id
              ORDER BY RoomID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $rooms = $statement->fetchAll();
    $statement->closeCursor();
    return $rooms;
}

function get_room($room_id) {
    global $db;
    $query = 'SELECT * FROM rooms
              WHERE RoomID = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":room_id", $room_id);
    $statement->execute();
    $room = $statement->fetch();
    $statement->closeCursor();
    return $room;
}

function delete_room($room_id) {
    global $db;
    $query = 'DELETE FROM rooms
              WHERE RoomID = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':room_id', $room_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_room($category_id, $Rnum, $Rname, $Drate) {
    global $db;
    $query = 'INSERT INTO rooms
                 (categoryID, roomNum, roomName, dalyRate)
              VALUES
                 (:category_id, :Rnum, :Rname, :Drate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':Rnum', $Rnum);
    $statement->bindValue(':Rname', $Rname);
    $statement->bindValue(':Drate', $Drate);
    $statement->execute();
    $statement->closeCursor();
}

function update_room($room_id, $category_id, $Rnum, $Rname, $Drate) {
    global $db;
    $query = 'UPDATE rooms
              SET categoryID = :category_id,
                  roomNum = :Rnum,
                  roomName = :Rname,
                  dalyRate = :Drate
               WHERE RoomID = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':Rnum', $Rnum);
    $statement->bindValue(':Rname', $Rname);
    $statement->bindValue(':Drate', $Drate);
    $statement->bindValue(':room_id', $room_id);
    $statement->execute();
    $statement->closeCursor();
}
?>