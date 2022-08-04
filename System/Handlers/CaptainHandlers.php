<?php
require '../../vendor/autoload.php';

$query = "SELECT * FROM captains ";

// Search
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE full_name LIKE "%' . $_POST["search"]["value"] . '%" ';
}

// Order
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . intval($_POST['order']['0']['column'])+1 . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}

//Limit
if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$controller = new MD\Controllers\CaptainsController();
$controller->query($query);
$controller->execute();
$result=$controller->fetch();
$filtered_rows = $controller->rowCount();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["full_name"];
    $data[] = $sub_array;
}
$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => $controller->allCount(),
    "data" => $data
);
echo json_encode($output);
?>