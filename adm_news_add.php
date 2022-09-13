<?php 
    require("connect_db.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin school</title>
        <link rel="stylesheet" href="css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
    <?php require_once("adm_header.php"); ?>
        <div class="row first_div"></div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="row" >
                    <ul class="nav nav-tabs"align="center">
                        <li class="nav-item">
                            <a class="nav-link active" href="adm_news_add.php">Додати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adm_news_update.php">Редагувати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adm_news_delete.php">Видалити</a>
                        </li>
                    </ul>
                </div>
                <div class="row after_menu"></div>
                <h2 align="center">Додати статтю</h2>
                <div class="row after_menu"></div>
                <form action="adm_news_add.php" method="post" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <label for="titleNews">Заголовок статті</label>
                        <input type="text" class="form-control" name="titleNews">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="textNews">Текст</label>
                        <textarea rows="10" cols="30" name="textNews" class="form-control"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                            <label for="userfile">Виберіть головне зображення</label><br>
                            <input name="userfileMain" type="file" >
                    </fieldset>
                    <fieldset class="form-group">
                            <label for="userfile">Виберіть зображення</label><br>
                            <input name="userfile[]" type="file" multiple="true">
                    </fieldset>
                    <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти</button>
                </form>
                <?php
                    if(isset($_POST['123'])){
                        if(!empty($_POST['titleNews']) and !empty($_POST['textNews'])){
                            $title=$_POST['titleNews'];
                            $text=$_POST['textNews'];
                            $text1=substr($text, 0, 70)."...";
                            $img="";
                            for($i=0;$i<count($_FILES['userfile']['name']);$i++){
                                $file = "adm_img/".$_FILES['userfile']['name'][$i];
                                $file1= "adm_img/".$_FILES['userfile']['name'][$i];
                                move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $file);
                                $img=$img.$file1."*";
                            }
                            $date=date("d.m.Y");
                            $file2 = "adm_img/".$_FILES['userfileMain']['name'];
                            move_uploaded_file($_FILES['userfileMain']['tmp_name'], $file2);
                            $sql="INSERT INTO news (name, main_foto, date, text, s_text, fotos) VALUES ('$title', '$file2', '$date', '$text', '$text1','$img')";
                            $res=mysqli_query($connect,$sql);
                            if($res){
                                echo "Статтю додано";
                            }
                        } else {
                            echo '  * Заповніть усі поля!';
                            } 
                        }?>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </body>
</html>