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
                            <a class="nav-link" href="adm_t_update.php">Редагувати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="adm_t_delete.php">Видалити</a>
                        </li>
                    </ul>
                </div>
                <div class="row after_menu"></div>
                <h2 align="center">Видалити вчителя</h2>
                <div class="row after_menu"></div>
                <form method="post" action="adm_t_delete.php">
                    <select class="custom-select" name="selectT">
                        <option selected>Виберіть вчителя</option>
                    <?php 
                        $sql="SELECT * FROM teachers";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            $a0=$result[0];
                            echo "<option value=\"$a0\">$a0</option>";
                        }                        
                    ?>
                </select><br><br>
                <input type="submit" class="btn btn-primary" value="Видалити" name='456'></button>
                <br><hr><br>
                    <?php 
                        if(!empty($_POST['selectT'])){
                            $id=$_POST['selectT'];
                            $sql="DELETE FROM teachers WHERE name='$id'";
                            $res=mysqli_query($connect,$sql);
                            if($res){
                                echo "Вчителя видалено";
                            }
                            
                             }
                ?>
                    
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </body>
</html>