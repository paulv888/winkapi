<?php
  include '../db.php';
  header("Content-Type: application/json");

  $db = get_db();
  $query = "SELECT deviceType AS id, deviceDesc AS description FROM zigbeeDeviceType";
  $result = $db->query($query);
  if (!$result) {
    echo json_encode(["error" => "Cannot execute query."]);
    return;
  }

  $data = array();
  while($row = $result->fetchArray(SQLITE3_ASSOC)){
    $data[] = $row;
  }

  echo json_encode($data);
  $db->close();
?>
