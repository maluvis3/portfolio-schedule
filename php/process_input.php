<meta charset="utf-8">

<?php
$inputTit = nl2br($_POST['inputTit']);
$inputCon = nl2br($_POST['inputCon']);

$inputTit = addslashes($inputTit);
$inputCon = addslashes($inputCon);
$year = date("Y");
$today = date("m-d");

$con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
$sql = "insert into pf_contents(pt_title, pt_contents, regist_year, regist_day) values('$inputTit', '$inputCon', '$year', '$today')";

mysqli_query($con, $sql);

echo "
    <script>
      alert('제출이 완료되었습니다!');
      location.href='../index.php';
    </script>
  ";
?>