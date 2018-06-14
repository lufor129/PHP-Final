while($row = mysql_fetch_row($result)){
$table_data[]= array("id=>"$row['id'],name=>$row['name']);
}
echo json_encode($table_data);

