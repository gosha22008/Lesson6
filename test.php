<!DOCTYPE>
<html lang="ru">
<head>
    <title>Задание6</title>
    <meta charset="utf-8">
</head>
<?php
$aa = $_GET;
$k = key($aa);
$file = file_get_contents(__DIR__.'/DownloadedTests/'. $_GET[$k]);
$file1 = json_decode($file, true);
?>
<body>
<h3>
    <a href="admin.php" style="color: black">Загрузить тест</a><br>
    <a href="list.php" style="color: black">К списку тестов</a>
</h3>
<form action="" method="POST">
    <?php foreach ($file1 as $k => $v) { ?>
        <fieldset>
            <legend><?= "$k." . $file1[$k]["q$k"] ?></legend>
            <label><input name="q<?= $k ?>" value="0" type="radio"> <?= $file1[$k]['answer']['a0'] ?></label>
            <label><input name="q<?= $k ?>" value="1" type="radio"> <?= $file1[$k]['answer']['a1'] ?></label>
            <label><input name="q<?= $k ?>" value="2" type="radio"> <?= $file1[$k]['answer']['a2'] ?></label>
        </fieldset>
    <?php } ?>
    <input value="Отправить" type="submit">
</form>
</body>
</html>
<?php
$priem = $_POST;
if (isset($priem['q0']) and isset($priem['q1']) and isset($priem['q2'])) {
    foreach ($file1 as $key => $value) {
        if ($file1[$key]['correct'] == $priem["q$key"]) {
            echo "$key -- Верно<br>";
        } else echo "$key -- Неверно<br>";
    }
}
?>