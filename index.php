<?php
require_once "dbc.php";

// var_dump(getAllFile());
$files = getAllFile();


$view = "";
foreach($files as $file):
    $view .= '<img src=';
    $view .= $file['file_path'];
    $view .= ' alt="" width="500px">';
    $view .= '<p>';
    $view .= h("{$file['description']}");
    $view .= ' <a href="delete.php?id=';
    $view .= $file['id'];
    $view .= '">削除</a></p>';
endforeach;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- エンコードタイプ: フォームにファイルを送信する機能がある -->
    <!-- actionはfileの送り先 -->
    <form enctype="multipart/form-data" action="./file_upload.php" method="POST">
        <div class="file-up">
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
            <!-- type=fileでファイルを上げることができる。 -->
            <input name="img" type="file" accept="image/*" />
        </div>
        <div>
            <textarea
                name="caption"
                placeholder="キャプション（140文字以下）"
                id="caption"
            ></textarea>
        </div>
        <div class="submit">
            <input type="submit" value="送信" class="btn" />
        </div>
    </form>

    <div>
        <?= $view ?>
        <!-- <?php foreach($files as $file): ?> -->
            <!-- <img src="<?= "{$file['file_path']}"?>" alt="" width="500px"> -->
            <!-- <p><?= h("{$file['description']}") ?> <a href="delete.php?id='. $file['id']' .">削除</a></p> -->
        <!-- <?php endforeach ?> -->
    </div>


</body>
</html>



