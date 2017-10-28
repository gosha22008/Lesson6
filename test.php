<!DOCTYPE>
<html lang="ru">
<head>
    <title>Задание6</title>
    <meta charset="utf-8">
</head>
<?php
$aa = $_GET;
$k = key($aa);
if (isset ($_GET[$k])) {
    $file = file_get_contents(__DIR__ . '/DownloadedTests/' . $_GET[$k]);
    $file1 = json_decode($file, true);
} else echo 'ошибка';

?>
<body>
<h3>
    <a href="admin.php" style="color: black">Загрузить тест</a><br>
    <a href="list.php" style="color: black">К списку тестов</a>
</h3>
<form action="" method="POST">
    <?php
    $i = 0;
    foreach ($file1 as $k => $v) {
        if (isset($file1[$k]["q$k"]) and isset($file1[$k]['answer']["a0"])) { ?>
            <fieldset>
                <legend><?= "$k." . $file1[$k]["q$k"] ?></legend>
                <?php
                $j = 0;
                while (isset($file1[$k]['answer']["a$j"])) { ?>
                <label><input name="q<?= $k ?>" value="<?=$j ?>" type="radio">
                    <?= $file1[$k]['answer']["a$j"] ?></label>
                <?php $j ++; } ?>
                <!--                <label><input name="q--><? //= $k ?><!--" value="0" type="radio"> -->
                <? //= $file1[$k]['answer']['a0'] ?><!--</label>-->
                <!--                <label><input name="q--><? //= $k ?><!--" value="1" type="radio"> -->
                <? //= $file1[$k]['answer']['a1'] ?><!--</label>-->
                <!--                <label><input name="q--><? //= $k ?><!--" value="2" type="radio"> -->
                <? //= $file1[$k]['answer']['a2'] ?><!--</label>-->
            </fieldset>
            <?php
        } else {
            $i++;
            if ($i == 1) {
                echo 'неверный формат теста!';
            }
        }
    } ?>
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