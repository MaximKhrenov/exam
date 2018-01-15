<?php
    echo '<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:"textarea" })</script>';
    if(isset($_GET['add_tovar'])) {
        echo '<div class="dobavka">
        <form class="inn" enctype="multipart/form-data" method="POST">
        <h3>Добавление товара</h3>
        <input type="text" class="vhod" name="name" placeholder="Название"><br>
        <input type="text" class="vhod" name="cena" placeholder="Цена"><br>
        <input type="file" class="vhod" name="img"><br>
        <textarea name="text">Описание</textarea><br>
        <input type="submit" class="but_vhod" name="submit_dob" value="Добавить">
        </form></div>';
        if(isset($_POST['submit_dob'])) {
            include 'db.php';
            $name = $_POST['name'];            
            $cena = $_POST['cena'];
            $text = $_POST['text'];
            $path = "../tovar/";
            $photo = time().$_FILES['img']['name'];
            copy($_FILES['img']['tmp_name'],$path.time().$_FILES['img']['name']);
            $db->query("INSERT INTO `tovar` (`tov`,`cena`,`opis`,`img`) VALUES ('$name','$cena','$text','$photo')");
        }
    }
    if(isset($_GET['delete_tovar'])) {
        include 'db.php';
        $delete=$db->query("SELECT * FROM `tovar`");
            while($result = mysqli_fetch_assoc($delete)) 
            {echo '<tr><td>'.$result['tov'].'</td></tr><a href="?delete&id='.$result['id'].'">X</a>';
            }
                if(isset($_GET['delete'])) {
                    include 'db.php';
                $del=$_GET['id'];
                $db->query("DELETE FROM `tovar` WHERE  $del = `id`");
                echo '<h4 style="margin-left:20px;">Поле успешно удалено</h4>'; 
            }
            
}

if(isset($_GET['update_tovar'])) {
            echo '<div><h3>Изменение товара</h3>';
                include'db.php';
                $cat = $db->query("SELECT * FROM `tovar`");
                $catresult = mysqli_fetch_assoc($cat);
                echo '
                    <form enctype="multipart/form-data" method="POST">
                        <input type="text" name="tov" value="'.$catresult['tov'].'"><br>
                        <input type="text" name="cena" value="'.$catresult['cena'].'"><br>
                        <input type="text" name="opis" value="'.$catresult['opis'].'"><br>
                        <input type="submit" name="submit_cat" value="Изменить"><br>
                    </form>';}
                
            if(isset($_POST['submit_cat'])) {
                $tov = $_POST['tov'];
                $cena = $_POST['cena'];
                $opis = $_POST['opis'];
                $db->query("UPDATE `tovar` SET `tov`='$tov', `cena` = '$cena', `opis` = '$opis' ");
            }
if(isset($_GET['array_tovar'])) {
            echo '<div><h3>Заказы</h3>';
                include'db.php';
                $cat = $db->query("SELECT * FROM `zakaz`");
                $zakaz = mysqli_fetch_assoc($cat);
                echo '<table><tr><td>'.$zakaz['id'].'</td><td>'.$zakaz['name'].'</td><td>'.$zakaz['cena'].'</td><td>'.$zakaz['fio'].'</td><td>'.$zakaz['phone'].'</td><td>'.$zakaz['mail'].'</td></tr></table>';
}
?>