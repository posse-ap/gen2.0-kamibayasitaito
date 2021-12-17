<?php
require("./db_connect.php");

// questionのbig_question_idを取得ここで東京と広島を分ける処理を整える。
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);


    $stmt = $db->prepare('SELECT * FROM questions WHERE big_question_id=?');
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $questions = $stmt->fetchAll();
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="main">
    <?php 
    foreach ($questions as $index => $question):
    $question_index=$index+1;    
    $stmt = $db->prepare('SELECT * FROM choices WHERE question_id=?');
    $stmt->bindValue(1, $question['id']);
    $stmt->execute();
    $data = $stmt->fetchAll(); 


    ?>

        <div class="quiz">

        <img src="./img/<?php echo $question['image'] ?>">

   

        <?php foreach ($data as $digit): ?>
         
         

            　　<div>
                <!-- 難読漢字クイズ -->
                <p></p>

                <ul>
                    <!-- 設問 -->
                    <li><?php     echo($digit['name'])  ?></li>
                </ul>


                　　
            　　</div>



         <?php endforeach; ?>
        </div>


    </div>
       <?php endforeach ?>

</body>

</html>