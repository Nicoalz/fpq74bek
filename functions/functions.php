<?php
//Select all items
function selectAllItems(PDO $db){
	$sql = "SELECT * FROM item ORDER BY `id` ASC";
	$req = $db->prepare($sql);
	$req->execute();
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

//Update item
function updateItem(PDO $db, $title, $isVisible, $item_id){

    if(!empty($item_id)){

        $sql = "UPDATE item SET title = :title, isVisible = :isVisible WHERE id = :itmid";
        $req = $db->prepare($sql);

        $req->execute(array(
            ':title' => $title,
            ':isVisible' => $isVisible,
            ':itmid' => $item_id
        ));

        return true;
    }
    return false;
}