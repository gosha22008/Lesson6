<!DOCTYPE>
<html lang="ru">
<head>
    <title>Задание6</title>
    <meta charset="utf-8">
</head>
<body>
<h3>Загрузить тест :</h3>
<form action="admin.php" method="post" enctype="multipart/form-data">
    <input name="myfile" type="file">
    <input type="submit" value="отправить">
    <input type="reset">
</form>
<br>
<h3>
    <a href="list.php" style="color: black">К списку тестов</a>
</h3>
</body>
<?php
if (isset($_FILES['myfile']) and !empty($_FILES['myfile']['name'])) {
    $parts = array();
    $parts = explode(".", $_FILES['myfile']['name']);
    $js = array("json", "");
    if (in_array($parts[count($parts) - 1], $js)) {
        if ($_FILES['myfile']['error'] == 0 and move_uploaded_file($_FILES['myfile']['tmp_name'], __DIR__ . '/DownloadedTests/' . $_FILES['myfile']['name'])) {
            echo 'Файл успешно загружен';
        }
    } else
        die("Wrong file type");

}


//
//$parts=array();
//$parts=explode(".", $_FILES['myfile']['name']);
//$js=array("json","");
//if(in_array($parts[count($parts)-1], $js))
//{
//    //все хорошо, обрабатываем файл
//}
//else
//    die("Wrong file type");
//
//
//$json = 'application/json';
//$octetStream = 'application/octet-stream';
//if (isset($_FILES['myfile']) and !empty($_FILES['myfile']['name'])) {
//    if ($_FILES['myfile']['type'] == $json or $_FILES['myfile']['type'] == $octetStream) {
//        if ($_FILES['myfile']['error'] == 0 and move_uploaded_file($_FILES['myfile']['tmp_name'], __DIR__ . '/DownloadedTests/' . $_FILES['myfile']['name'])) {
//            echo 'Файл загружен';
//        } else {
//            echo 'Ошибка! Файл не загружен !';
//        }
//    } else {
//        echo 'Неверное расширение! Подходят только .json';
//    }
//}
?>



