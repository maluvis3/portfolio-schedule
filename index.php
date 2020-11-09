<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Schedule</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <div class="wrap">
        <header>
            <div class="center">
                <h2>2020 Portfolio Schedules</h2>
            </div>
        </header>
        <section class="main">
            <div class="center">
                <div class="totalProgress">
                    <div class="totalTit">
                        <h2>전체 진행률</h2>
                    </div>
                    <div class="totalBar">
                        <span></span>
                    </div>
                </div>

                <div class="portfolios">
                    <h2 class="title">개별 포트폴리오 진행률</h2>
                </div>
                <div class="eachPort clear">

                    <?php
                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                    $sql = "select * from portfolio_process";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);

                    $num = $row['num'];
                    $main = $row['main'];
                    $db = $row['db'];
                    $api = $row['api'];
                    $uiux = $row['uiux'];
                    $renewal1 = $row['renewal1'];
                    $renewal2 = $row['renewal2'];
                    ?>

                    <form action="php/project_update.php?num=<?= $num ?>" method="post">
                        <div class="port1 port">
                            <h3>Main Project</h3>
                            <p><input type="text" value="<?= $main ?>" name="main" class="main">%</p>
                        </div>
                        <div class="port2 port">
                            <h3>Database Project</h3>
                            <p><input type="text" value="<?= $db ?>" name="db" class="db">%</p>
                        </div>
                        <div class="port3 port">
                            <h3>API Project</h3>
                            <p><input type="text" value="<?= $api ?>" name="api" class="api">%</p>
                        </div>
                        <div class="port4 port">
                            <h3>UI/UX Project</h3>
                            <p><input type="text" value="<?= $uiux ?>" name="uiux" class="uiux">%</p>
                        </div>
                        <div class="port5 port">
                            <h3>Renewal Project1</h3>
                            <p><input type="text" value="<?= $renewal1 ?>" name="renewal1" class="renewal1">%</p>
                        </div>
                        <div class="port6 port">
                            <h3>Renewal Project2</h3>
                            <p><input type="text" value="<?= $renewal2 ?>" name="renewal2" class="renewal2">%</p>
                        </div>
                        <div class="update">
                            <button type="submit" class="btn">Update</button>
                        </div>
                    </form>
                </div>

                <div class="portfolios">
                    <h2 class="title">포트폴리오 진행 상황</h2>
                </div>

                <div class="workList" id="workList">

                </div>

                <div class="number">
                    <span class="move minus" onclick="minus()"><i class="fa fa-angle-left"></i></span>

                    <?php
                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                    $sql = "select * from pf_contents order by num desc";
                    $result = mysqli_query($con, $sql);
                    $total_record = mysqli_num_rows($result);

                    $scale = 5;

                    if ($total_record % $scale == 0) {
                        $total_page = floor($total_record / $scale);
                    } else {
                        $total_page = floor($total_record / $scale) + 1;
                    }

                    for ($i = 1; $i <= $total_page; $i++) {

                    ?>

                    <span class="numCount" onclick="get_page('<?= $i ?>')"><?= $i ?></span>

                    <?php
                    }
                    ?>

                    <em class="mNum">
                        <b class="mCount">1</b> /
                        <b class="allCount"></b>
                    </em>

                    <span class="move plus" onclick="plus()"><i class="fa fa-angle-right"></i></span>
                </div>

                <div class="update">
                    <a href="process.php" class="btn">진행 상황 작성</a>
                </div>
            </div><!-- end of center -->
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
    $(document).ready(function() {
        var allCount = $(".numCount").length;
        $(".allCount").text(allCount);

        $.get('php/process_ajax.php', {
            page: 1
        }, function(args) {
            $("#workList").html(args);
            $(".numCount").eq(0).addClass("active");
        });
    });

    var val = 1;

    function get_page(no) {
        $(".numCount").removeClass("active");
        $(".numCount").eq(no - 1).addClass("active");
        $.get('php/process_ajax.php', {
            page: no
        }, function(args) {
            $("#workList").html(args);
            val = Number(no);
        });
    }

    function plus() {
        var lastNum = $(".numCount").length;
        if (val == lastNum) {
            get_page(lastNum);
            $(".mCount").text(lastNum);
        } else {
            get_page(val + 1);
            $(".mCount").text(val + 1);
        }
    }

    function minus() {
        if (val == 1) {
            get_page(1);
            $(".mCount").text(1);
        } else {
            get_page(val - 1);
            $(".mCount").text(val - 1);
        }
    }

    $(document).ajaxComplete(function() {
        var mql = window.matchMedia("screen and (max-width: 500px)");

        if (mql.matches) {
            for (var i = 0; i < $(".workContents").length; i++) {
                var txtLen = $(".workContents").eq(i).find(".contents").text();
                $(".workContents").eq(i).find(".contents a").text(txtLen.substr(0, 20) + "...");
            }
        }
    });
    </script>
</body>

</html>