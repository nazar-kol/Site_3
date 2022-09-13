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
                            <a class="nav-link " href="adm_t_add.php">Додати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="adm_t_update.php">Редагувати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adm_t_delete.php">Видалити</a>
                        </li>
                    </ul>
                </div>
                <div class="row after_menu"></div>
                <h2 align="center">Редагувати інформацію про вчителя</h2>
                <div class="row after_menu"></div>
                <form method="post" action="adm_t_update.php" enctype="multipart/form-data">
                    <select class="custom-select" name="selectTeacher">
                        <option selected>Виберіть вчителя</option>
                    <?php 
                        $sql="SELECT * FROM teachers";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            $a0=$result[0];
                            echo "<option value=\"$a0\"";
                            if(!empty($_POST['selectTeacher']) && $_POST['selectTeacher']=="$a0"){echo "selected";}
                            echo ">$a0</option>";
                        }                        
                    ?>
                </select><br><br>
                <input type="submit" class="btn btn-primary" value="Вибрати" name='456'></button>
                <br><hr><br>
                    <?php 
                        if(!empty($_POST['selectTeacher'])){
                            if($_POST['selectTeacher']!="Виберіть вчителя"){
                                $a=$_POST['selectTeacher'];
                                $sql="SELECT * FROM teachers WHERE name='$a'";
                                $res=mysqli_query($connect,$sql);
                                $result=mysqli_fetch_array($res);

                    ?>

                    <fieldset class="form-group">
                        <label for="tName">Прізвище, ім'я та по батькові</label>
                        <input type="text" class="form-control" id="tName" name="tName" value="<?php echo $result[0]?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="tPosition">Посада</label>
                        <input type="text" class="form-control" id="tPosition" name="tPosition" value="<?php echo $result[1]?>">
                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="789">Зберегти зміни</button><br><br>
                    <fieldset class="form-group">
                            <label for="userfile">Виберіть інше зображення</label><br>
                            <input name="userfile" type="file" >
                    </fieldset>
                    <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти</button>  
                    <?php 
                    if(isset($_POST['789'])){
                    $name=$_POST['tName'];
                    $position=$_POST['tPosition'];
                    $sql="UPDATE teachers SET name='$name', position='$position' WHERE name='$a'";
                    $res=mysqli_query($connect,$sql);
                    if($res){
                        echo "Зміни збережено";
                    } } 
                    if(isset($_POST['123'])){
                        unlink($result['foto']);
                        $file = "adm_img/".$_FILES['userfile']['name'];
                        move_uploaded_file($_FILES['userfile']['tmp_name'], $file);
                        $sql="UPDATE teachers SET foto='$file' WHERE name='$a'";
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