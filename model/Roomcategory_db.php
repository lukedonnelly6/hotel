<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM roomcategories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_category_room($category_id) {
    global $db;
    $query = 'SELECT * FROM roomcategories
              WHERE categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $roomcategory = $statement->fetch();
    $statement->closeCursor();    
    $category_room = $roomcategory['roomCategory'];
    return $category_room;
}

function add_category($Cname) {
    global $db;
    $query = 'INSERT INTO roomcategories (roomCategory)
              VALUES (:Cname)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Cname', $Cname);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM roomcategories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}
?>