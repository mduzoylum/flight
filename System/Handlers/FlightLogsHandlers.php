<?php
require '../../vendor/autoload.php';

$query = "SELECT * FROM flight_logs ";

// Search
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE code LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR origin LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR destination LIKE "%' . $_POST["search"]["value"] . '%" ';
}
//print_r($_POST['order']['0']);die("##");
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
$captain = new MD\Controllers\CaptainsController();
$flightLogs = new MD\Controllers\FlightLogsController();
$flightLogs->query($query);
$flightLogs->execute();
$result=$flightLogs->fetch();
$filtered_rows = $flightLogs->rowCount();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["code"];
    $sub_array[] = date('d.m.Y H:i',strtotime($row["schedule_date"]));
    $sub_array[] = $row["origin"];
    $sub_array[] = $row["destination"];
    $sub_array[] = ($captain->getById($row["captain_id"]))["full_name"];
    $sub_array[] = $row["status"]==1 ? 'Done' : 'Planned';
    $data[] = $sub_array;
}
$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => $flightLogs->allCount(),
    "data" => $data
);
echo json_encode($output);
?>