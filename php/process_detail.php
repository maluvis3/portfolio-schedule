<meta charset="UTF-8">
<?php
$num = $_GET['num'];

$con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
$sql = "select * from pf_contents where num=$num";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$pf_title = $row['pt_title'];
$pf_contents = $row['pt_contents'];
$regist_day = $row['regist_year'] . "-" . $row['regist_day'];

echo $pf_title;
echo $pf_contents;
echo $regist_day;