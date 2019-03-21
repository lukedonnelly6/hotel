<?php
function get_dates() {
    global $db;
    $query = 'SELECT * FROM customerdates
              ORDER BY customerID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_customer_date($customer_id) {
    global $db;
    $query = 'SELECT * FROM customerdates
              WHERE customerID = :customer_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();    
    $customerdate = $statement->fetch();
    $statement->closeCursor();    
    $customer_Date = $customerdate['customerDate'];
    return $customer_Date;
}

function add_date($Cdate) {
    global $db;
    $query = 'INSERT INTO customerdates (customerDate)
              VALUES (:Cdate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Cdate', $Cdate);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_date($customer_id) {
    global $db;
    $query = 'DELETE FROM customerdates
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}
?>