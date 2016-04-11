<?php

if (isset($_POST)) {
    var_dump($_POST);
    include("../config/database.php");
    include("../include/db_connect.php");
    include("../models/tableModel.php");
    $tableModel = new tableModel();

    if ($_POST['action'] == "edit") {
        //$tableModel->editFromDatabase($tableName, $primaryKey);
    } else if ($_POST['action'] == "delete") {
        $tableModel->deleteRowFromTable($_POST['table'], $_POST['primaryKey'], $_POST['primaryKeyValue']);
    }
    return true;
    //data: {action: "edit", table: tableName, newValue: gridContent, column: colName, primaryKey: primaryKeyArray, primaryKeyValue: primaryKeyValueArray},
}

?>