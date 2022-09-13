<?php 
    require("connect_db.php");

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin school</title>
        <link rel="stylesheet" href="css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
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
                            <a class="nav-link " href="adm_news_add.php">Додати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="adm_news_update.php">Редагувати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adm_news_delete.php">Видалити</a>
                        </li>
                    </ul>
                </div>
                <div class="row after_menu"></div>
                <h2 align="center">Редагувати статтю</h2>
                <div class="row after_menu"></div>
                <form method="post" action="adm_news_update.php" enctype="multipart/form-data">
                    <select class="custom-select" name="selectNews">
                        <option selected>Виберіть статтю</option>
                    <?php 
                        $sql="SELECT * FROM news";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            $a0=$result[0];
                            $a1=$result[1];
                            echo "<option value=\"$a0\"";
                            if(!empty($_POST['selectNews']) && $_POST['selectNews']=="$a0"){echo "selected";}
                            echo ">$a1</option>";
                        }                        
                    ?>
                </select><br><br>
                <input type="submit" class="btn btn-primary" value="Вибрати" name='456'></button>
                <br><hr><br>
                    <?php 
                        if(!empty($_POST['selectNews'])){
                            if($_POST['selectNews']!="Виберіть статтю"){
                                $a=$_POST['selectNews'];
                                $sql="SELECT * FROM news WHERE id='$a'";
                                $res=mysqli_query($connect,$sql);
                                $result=mysqli_fetch_array($res);

                    ?>

                    <fieldset class="form-group">
                        <label for="titleNews">Заголовок статті</label>
                        <input type="text" class="form-control" id="titleNews" name="titleNews" value="<?php echo $result[1]?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="textNews">Текст</label>
                        <textarea rows="10" cols="30" name="textNews" class="form-control" ><?php echo $result[4]?></textarea>
                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="789">Зберегти зміни</button><br>
                    <fieldset class="form-group">
                            <label for="userfileMain">Виберіть головне зображення</label><br>
                            <input name="userfileMain" type="file">
                    </fieldset>
                    <button type="submit" class="btn btn-primary" value="111" name="111">Зберегти</button>
                    <fieldset class="form-group">
                            <label for="userfile">Виберіть зображення</label><br>
                            <input name="userfile[]" type="file" multiple="true">
                    </fieldset>
                    <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти</button>  
                    <?php 
                    if(isset($_POST['789'])){
                        $title=$_POST['titleNews'];
                        $text=$_POST['textNews'];
                        $text1=substr($text, 0, 70)."...";
                        $id=$result[0];
                        $sql="UPDATE news SET name='$title', s_text='$text1', text='$text' WHERE id='$id'";
                        $res=mysqli_query($connect,$sql);
                        if($res){
                            echo "Зміни збережено";
                        } 
                    } 
                    if(isset($_POST['123'])){
                        $ar_img=array();
                        $a=$result[6];
                        $q="";
                        for($i=0;$i<strlen($a);$i++){
                            if($a[$i]=="*"){
                                $ar_img[]=$q;
                                $q="";
                            } else {
                                $q=$q.$a[$i];
                            }
                        }
                        for($i=0;$i<count($ar_img);$i++){
                            unlink($ar_img[$i]);
                        }
                        $img="";
                        for($i=0;$i<count($_FILES['userfile']['name']);$i++){
                            $file = "adm_img/".$_FILES['userfile']['name'][$i];
                            $file1 = "adm_img/".$_FILES['userfile']['name'][$i];
                            move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $file);
                            $img=$img.$file1."*";
                        }
                        $id=$result[0];
                        $sql="UPDATE news SET fotos='$img' WHERE id='$id'";
                        $res=mysqli_query($connect,$sql);
                        if($res){
                            echo "Фото змінено";
                        }
                    }   
                    if(isset($_POST['111'])){
                        unlink($result['main_foto']);
                        $file = "adm_img/".$_FILES['userfileMain']['name'];
                        move_uploaded_file($_FILES['userfileMain']['tmp_name'], $file);
                        $id=$result[0];
                        $sql="UPDATE news SET main_foto='$file' WHERE id='$id'";
                        $res=mysqli_query($connect,$sql);
                        if($res){
                            echo "Фото змінено";
                        }
                    }   
                } } 
                ?>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </body>
</html>