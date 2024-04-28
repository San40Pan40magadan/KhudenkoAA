<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Худенко А.А.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-9">
                    <div class="nav_text">Информация обо мне!</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8"> 
                <h3>Худенко Александр Александрович, главный инженер по информационной безопасности в Банке.
                    Обучаюсь на последнем курсе магистерской программе "Кибербезопасность".
                    Готовлюсь к сдаче ВКР параллельно прохожу PT START.</h3>
            </div>
            <div class="col-4">
                <div class="row my_photo"></div>
                <div class="row"><p class="title_photo">Худенко А.А.</p></div>
                <a href="https://magadan.hh.ru/resume/83dca574ff0cec8ff50039ed1f616c5855494d"
                >Ссылка на HR</a
                >
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">Click me</button>
                <p id="demo"></p>
          </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Привет,<?php echo $_COOKIE['User']; ?><h1>
            </div>
        <div class="row">
            <h1></h1>
        </div>            
            <div class="button_js">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text"  class="form"  type="text" name="title" placeholder="Заголовок вашего поста">
                    <textarea name="text" class="form" rows="5" placeholder="Введите текст вашего поста ..."></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" class="btn_red" name="submit">Сохранить пост!</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>

</html>

<?php
#require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    
    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
    
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

}

?>