<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if(isset($_POST['id'])&&(isset($_POST['index']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                
                switch($index){
                    case "cars":
                        if((isset($_POST['brand']))&&(isset($_POST['model']))&&(isset($_POST['year']))&&(isset($_POST['transmission']))&&(isset($_POST['production_volume']))&&(isset($_POST['cost']))){
                            $brand = htmlentities(mysqli_real_escape_string($link, $_POST['brand']));
                            $model = htmlentities(mysqli_real_escape_string($link, $_POST['model']));
                            $year = htmlentities(mysqli_real_escape_string($link, $_POST['year']));
                            $transmission = htmlentities(mysqli_real_escape_string($link, $_POST['transmission']));
                            $production_volume = htmlentities(mysqli_real_escape_string($link, $_POST['production_volume']));
                            $cost = htmlentities(mysqli_real_escape_string($link, $_POST['cost']));
                            if((strlen($brand)==0)||(strlen($model)==0)||(strlen($year)==0)||(strlen($transmission)==0)||(strlen($production_volume)==0)||(strlen($cost)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET brand = '$brand', model = '$model', year = '$year', transmission = '$transmission', production_volume = '$production_volume', cost = '$cost' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "seller":
                        if((isset($_POST['name']))&&(isset($_POST['adress']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $adress = htmlentities(mysqli_real_escape_string($link, $_POST['adress']));
                            if((strlen($name)==0)||(strlen($adress)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET name = '$name', adress = '$adress' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "stock":
                        echo $index;
                        if((isset($_POST['cars_select']))&&(isset($_POST['seller_select']))){
                            $cars_select = htmlentities(mysqli_real_escape_string($link, $_POST['cars_select']));
                            $seller_select = htmlentities(mysqli_real_escape_string($link, $_POST['seller_select']));
                            echo $cars_select;
                            echo $seller_select;
                            if(($cars_select=="")||($seller_select=="")){
                                 die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET cars = '$cars_select' , seller = '$seller_select'  WHERE $database.$index.id = '$id'";
                            echo $query;
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
            }
		}
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>