<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
			if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "cars":
                        echo("<fieldset><legend>Добавить новую машину</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        echo("Введите марку: <input name='brand' type='text'/> <br>");
                        echo("Введите модель: <input name='model' type='text'/> <br>");
                        echo("Введите год: <input name='year' type='text'/> <br>");
                        echo("Введите трансмиссию: <input name='transmission' type='text'/> <br>");
                        echo("Введите объем выпуска: <input name='production_volume' type='text'/> <br>");
                        echo("Введите стоимость:  <input name='cost' type='text'/> <br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "seller":
                        echo("<fieldset><legend>Добавить новый автосалон</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        echo("Введите имя: <input name='name' type='text'/> <br>");
                        echo("Введите адресс: <input name='adress' type='text'/> <br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "stock":
                        $queryTab_0 = "cars";
                        $queryTab_1 = "seller";
                        $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                        $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                        $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                        $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить машину к автосалону</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        $id_0 = "cars_select";
                        echo("<label for='$id_0'>Список разрешенных характеристик: </label>");
                        echo("<select id='$id_0' name='$id_0'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_0)){
                            echo("<option value='$row[0]'> $row[0] - $row[1] $row[2]</option>");
                        }
                        echo("</select><br>");
                        $id_1 = "seller_select";
                        echo("<label for='$id_1'>Список соответствующих значений: </label>");
                        echo("<select id='$id_1' name='$id_1'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_1)){
                            echo("<option value='$row[0]'> $row[0] - $row[1] $row[2]</option>");
                        }
                        echo("</select><br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                }
			    
			}
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>