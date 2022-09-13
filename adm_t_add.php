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
                            <a class="nav-link active" href="adm_t_add.php">Додати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adm_t_update.php">Редагувати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adm_t_delete.php">Видалити</a>
                        </li>
                    </ul>
                </div>
                <div class="row after_menu"></div>
                <h2 align="center">Додати вчителя</h2>
                <div class="row after_menu"></div>
                <form action="adm_t_add.php" method="post" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <label for="tName">Прізвище, ім'я та по батькові</label>
                        <input type="text" class="form-control" name="tName">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="tPosition">Посада</label>
                        <input type="text" class="form-control" name="tPosition">
                    </fieldset>
                    <fieldset class="form-group">
                            <label for="userfile">Виберіть фото</label><br>
                            <input name="userfile" type="file">
                    </fieldset>
                    <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти</button>
                </form>
                <?php
                    if(isset($_POST['123'])){
                        if(!empty($_POST['tName']) and !empty($_POST['tPosition'])){
                            $name=$_POST['tName'];
                            $pos=$_POST['tPosition'];
                            $file = "adm_img/".$_FILES['userfile']['name'];
                            move_uploaded_file($_FILES['userfile']['tmp_name'], $file);
                            $sql="INSERT INTO teachers (name, position, foto) VALUES ('$name', '$pos', '$file')";
                            $res=mysqli_query($connect,$sql);
                            if($res){
                                echo "Вчителя додано";
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