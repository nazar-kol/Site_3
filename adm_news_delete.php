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
                            <a class="nav-link" href="adm_news_update.php">Редагувати</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="adm_news_delete.php">Видалити</a>
                        </li>
                    </ul>
                </div>
                <div class="row after_menu"></div>
                <h2 align="center">Видалити статтю</h2>
                <div class="row after_menu"></div>
                <form method="post" action="adm_news_delete.php">
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
                <input type="submit" class="btn btn-primary" value="Видалити" name='456'></button>
                <br><hr><br>
                    <?php 
                        if(!empty($_POST['selectNews'])){
                            $id=$_POST['selectNews'];
                            $sql="DELETE FROM news WHERE id='$id'";
                            $res=mysqli_query($connect,$sql);
                            if($res){
                                echo "Статтю видалено";
                            }
                            
                             }
                ?>
                    
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </body>
</html>