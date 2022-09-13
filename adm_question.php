<?php 
    require("connect_db.php");
    $sql="SELECT * FROM question ORDER BY date DESC";
    $res=mysqli_query($connect,$sql);
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
                <h2 align="center">Запитання від користувачів</h2>
                <div class="row after_menu"></div>
                <?php 
                    while($result=mysqli_fetch_array($res)){
                        echo "<label>".$result[1]." ".$result[0]."<br>".$result[2]."</label><p>".$result[3]."</p><p align='right'>".$result[4]."</p><hr>";
                    }
                ?>
                
            </div>
            <div class="col-sm-3"></div>
        </div>
    </body>
</html>