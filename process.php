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
    <div class="wrap process">
        <header>
            <a href="index.php" class="home"><i class="fa fa-home" aria-hidden="true"></i></a>
            <div class="center">
                <h2>2020 Portfolio Schedules</h2>
            </div>
        </header>

        <section class="main">
            <div class="center">
                <div class="processTitle">
                    <h1>금일 진행 상황</h1>
                </div>

                <form action="php/process_input.php" method="post">
                    <div class="inputBox">
                        <div class="inputTitle">
                            <textarea placeholder="상황 요약" name="inputTit"></textarea>
                        </div>
                        <div class="inputContents">
                            <textarea placeholder="세부 내용" name="inputCon"></textarea>
                        </div>
                        <div class="update">
                            <button type="submit" class="btn">금일 상황 제출</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>