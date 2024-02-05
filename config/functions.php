<?php
require_once 'db.php';

function display_data()
{
  global $con;
  $query = "select * from donors where datediff(curdate(),last_donated)>90 and age>=18 and weight>=50";
  $result = mysqli_query($con, $query);
  return $result;
}
