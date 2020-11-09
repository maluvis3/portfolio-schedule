<meta charset="UTF-8">
<?php
$page = $_REQUEST["page"];

if ($page == "") {
    $page = 1;
}

$from = ($page - 1) * 5;

$con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
$sql = "select * from pf_contents order by num desc limit $from, 5";

$contents = mysqli_query($con, $sql);
?>

<p class="workTitle clear">
    <span class="num">번호</span>
    <span class="contents">내용</span>
    <span class="date">작성일</span>
</p>

<?php
while ($row = mysqli_fetch_array($contents)) {
    $num = $row['num'];
    $pf_title = $row['pt_title'];
    $year = $row['regist_year'];
    $today = $row['regist_day'];
?>

<p class="workContents clear">
    <span class="num"><?= $num ?></span>
    <span class="contents"><a href="detail_process.php?num=<?= $num ?>"><?= $pf_title ?></a></span>
    <span class="date"><em><?= $year ?>-</em><?= $today ?></span>
</p>

<?php
}
?>