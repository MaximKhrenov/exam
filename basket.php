<?php
    require 'config.php';
    require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Корзина</title>
  

  <script src="js/jquery-3.1.1.min.js"></script>
  

</head>
<body>
<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="logo">
          <a href="#"><img src="img/logo.png"></a>
        </div>
        <div class="navigation">
           <nav>
                            <ul class="custom-list list-inline">
                                <li><a href="index.php">Главная</a></li>
                                <li><a href="catalog.php">Каталог</a></li>
                                <li><a href="about.html">Наша команда</a></li>
                                <li><a href="portfolio.html">Портфолио</a></li>
                                <li><a href="contacts.php">Контакты</a></li>
                                <li class="corz"><a href="basket.php"><img src="img/corz.png"></a></li>

                            </ul>
                        </nav>

        </div>
      </div>
    </div>
  </div>
</header>
<main class="basket">
    <div class="container">
                        <div class="row">
  <?php
  if (isset($_GET['delete'])&& $_GET['delete'] == 'all'){
    session_unset();
    session_destroy();
  } 
   if (isset($_GET['oplata'])&& $_GET['oplata'] == 'opl'){
    session_unset();
    session_destroy();
  }
  if(!isset($_SESSION['cart'])) {
    echo 'Корзина пуста';
    $_SESSION['cart'] = array();
  }
  else {
    echo '
          <div class="col-md-12 basket">
           <table>
                <thead>
                    <tr>
                       
                        <td>Название</td>
                        <td>Цена</td>
                        <td>Количество</td>
                        <td>Сумма</td>
                    </tr>
                </thead>';
    foreach ($_SESSION['cart'] as $key => $value) {
      $tovar = $db->query("SELECT * FROM `tovar` WHERE `id` = '$value'");
      while ($res = mysqli_fetch_assoc($tovar)) {

        echo '<tbody>
                   <tr>
                        <td><div class="col-md-2"></div>' . $res['tov'] . '</td>
                        <td>' . $res['opis'] . '<br> </td>
                        <td><input type="text" class="colvo" value="1"><br></td>
                        <td class="summa">' . $res['cena'] . '<br></td>
                        <td>
                          <a href="?delete=' . $res['id'] . '">Удалить</a>
                        </td>
                    </tr>
                </tbody>
                
                ';
        if (isset($_GET['delete'])) {
          $delete = $_GET['delete'];
          if ($delete == $value) {
            unset($_SESSION['cart'][$key]);
          }
        }
      }
    }
    echo '</table>
    
                <a class="delete" href="?delete=all">Очистить Корзину</a>
                <a href="?oplata=opl"  class="oform_but" value="Оформить заказ" id="add">Оформить заказ</a>
                
                ';
  }
  ?>
  
                            
                            
                            
                            
                         
                   
                    
    <?php                
     foreach ($_SESSION['cart'] as $key => $value) {
      $tovar = $db->query("SELECT * FROM `tovar` WHERE `id` = '$value'");
      while ($res = mysqli_fetch_assoc($tovar)) {

      
                   
                 
                        echo '
                        <form id="formMain" method="post" action="">
                        <h3>Услуга:</h3> <input type="text" value="'.$res['tov'].'" name="name" >
                        <h3>К оплате:<h3> <input name="price" type="text" value="'.$res['cena'].' Рублей" >
                        
                        
                    
                        
                        
                   ';
                         
      }}
             ?>
                        <input type="text" name="fio" placeholder="Введите фамилию" required="required"  ><br>
                        <input type="text" name="phone" placeholder="Введите телефон" required="required"> <br>
                        <input type="text" name="mail" placeholder="Введите E-mail" required="required"><br>
                         <input id="order" type="submit" name="opl"><br>
                        
                             </form>
        </div>
    
        </div>
 
<?php
                             
if($_POST)
    {
        $name = $_POST['name'];
        $FIO = $_POST['fio'];
        $price = $_POST['price'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $db->query("INSERT INTO `zakaz` (`name`,`fio`, `cena`,`phone`,`mail`) VALUES ('$name', '$FIO', '$price', '$phone','$mail')");
    }
?>
                            </div>
        </div> 
    </div>
</main>
<div class="message" style="display:none;">'Ваше сообщение отправлено'</div>
<script>$(document).ready(function(){
      $('#order').on('click',function(){
        $('.message').show();
    });  
    });
</script>
<!--  Scripts-->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/jquery.scrolly.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/kor.js"></script>

</body>
</html>