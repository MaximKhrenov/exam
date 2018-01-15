<!doctype html>
<html>
<head>
</head>
<body>
    <?php
            include 'db.php';
            $tovar=$db->query("SELECT * FROM `tovar`");
            while($result = mysqli_fetch_assoc($tovar)) {
            echo '<div class="row">
                <div class="col-md-3 col-sm-3 co-xs-3">
                    <img src="tovar/'.$result['img'].'">
                </div>
                <div class="col-md-9 col-sm-9 co-xs-9">
                    <h3>'.$result['tov'].'</h3>
                    <p>'.$result['opis'].'</p>
                    <a  class="all" href="full_tovar.php?id='.$result['id'].'">Подробнее</a>
                </div>
                </div>';
            }
    ?>      
</body>
<footer>
</footer>
</html>