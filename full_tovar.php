<!doctype html>
<html>
    <head><script type="text/javascript" src="js/jquery-3.1.1.js"></script></head>
    <body>
        
<?php
            include 'db.php';
            $id = $_GET['id']; 
            $full = $db->query("SELECT * FROM `tovar` WHERE `id` = '$id'");
            $res = mysqli_fetch_assoc($full); 
            $res['tov'];
        
            do{ 
            echo '<h1 class="text-center">'.$res['tov'].'</h1>
            <div class="col-md-12 full_img text-center"><img src="tovar/'.$res['img'].'"></div>
            <div class="col-md-12"><p>'.$res['opis'].'</p></div></div>
            <div class="col-md-12"><p>'.$res['cena'].' EURO</p></div> <div class="col-md-6"> 
                                <button class="add_basket" id="addCart'.$res['id'].'">В корзину</button>
                                    </div>
                                    </div>
                                    
                                    <script>
                $(document).ready(function(){
                    $("#addCart'.$res['id'].'").bind("click", function(){
                        $.ajax({
                            url: "config.php",
                            type:"GET",
                            data:({add_tovar: '.$res['id'].'}),
                            dataType :"html",
                            success: function (data){
                                $(".successadd").show();
                                $(".successadd").fadeOut(2000);
                                delay(3000);

                            }


                        })
                    })
                });
            </script>';
            } 
            while($res = mysqli_fetch_assoc($full))     
?>
        <div class="successadd" style="display:none;"><p>Товар успешно добавлен в корзину!</p></div>
        
    </body>
</html>