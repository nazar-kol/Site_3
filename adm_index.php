<?php 
    require("connect_db.php");
    $sql="SELECT * FROM main";
    $res=mysqli_query($connect,$sql);
    $result=mysqli_fetch_array($res);
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
            <h2 align="center">Змінити основну інформацію</h2>
                <div class="row after_menu"></div>
                <form action="adm_index.php" method="post" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <label for="titleNews">Телефон</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $result[1] ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="textNews">Електронна пошта</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $result[0] ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="textNews">Адреса</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $result[2] ?>">
                    </fieldset>
                    <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти зміни</button>
                </form>
                <?php 
                    if(isset($_POST['123'])){
                        $p=$_POST['phone'];
                        $e=$_POST['email'];
                        $a=$_POST['address'];
                        $sql="UPDATE main SET email='$e', phone='$p', adress='$a'";
                        $res=mysqli_query($connect,$sql);
                    }
                ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </body>
</html>