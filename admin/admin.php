<!doctype html>
<html>
<head></head>
    <body>
        <main>
            <div class="col-md-12">
               <?php
                    echo '<div class="col-md-12"><h1 style="margin-left: 1%;padding-top: 10px;font-family:"Roboto Condensed", sans-serif">Панель администрирования</h1></div>';
                    echo '<div class="col-md-12">
                            <div class="col-md-2">
                            <h3><a href="?add_tovar=1">Добавить товар</a></h3></div>
                            <div class="col-md-2">
                            <h3><a href="?delete_tovar=1">Удалить товар</a></h3>
                            </div>
                            <div class="col-md-2">
                            <h3><a href="?update_tovar=1">Изменить товар</a></h3>
                            <h3><a href="?array_tovar=1">Заказы</a></h3>
                            </div>';
                    include "add_tovar.php";
                echo'<div>';
                    include 'db.php';
        $echo=$db->query("SELECT * FROM `tovar`");
            while($result = mysqli_fetch_assoc($echo)) 
            {echo '<table><tr><td>'.$result['tov'].'</td><td>'.$result['cena'].'</td></tr></table>';
            }
                if(isset($_GET['delete'])) {
                    include 'db.php';
                $del=$_GET['id'];
                $db->query("DELETE FROM `tovar` WHERE  $del = `id`");
                echo '<h4 style="margin-left:20px;">Поле успешно удалено</h4>'; 
            }
                   
                '</div>'
                 ?>
            </div>
        </main>
    </body>
</html>