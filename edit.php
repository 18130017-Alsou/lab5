<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
			if(isset($_GET['id'])&&isset($_GET['query'])){
                $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['query']));
                switch($index){
                case "cars":
                    $array = array("№", "brand", "model", "year", "transmission", "production_volume", "cost");
                    $query = "SELECT * FROM $database.$index WHERE id='$id'";
                    $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                    $rows = array();
                    echo("<fieldset><legend>Изменить машину</legend>");
                    echo("<form id='form' method='post' action='save_edit.php'>");
                    while ($row=mysqli_fetch_array($result)){
                        for($i = 0; $i < count($row)/2; $i++){
                            if($i == 0){
                                echo("<input type='hidden' name='id' value='$id'> <br>");
                            } else {
                                $ar =  $row[$i];
                                echo($array[$i].": <input name='$array[$i]' size='50' type='text' value='$ar'> <br>");
                            }
                        }
                    }
                    echo("<input type='hidden' name='index' value='$index'> <br>");
                    
                    echo("<input type='submit' value='Сохранить'/> <br>");
                    echo("</form>");
                    echo("</fieldset>");
                break;
                case "seller":
                    $array = array("№", "name", "adress");
                    $query = "SELECT * FROM $database.$index WHERE id='$id'";
                    $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                    $rows = array();
                    echo("<fieldset><legend>Изменить автосалон</legend>");
                    echo("<form id='form' method='post' action='save_edit.php'>");
                    while ($row=mysqli_fetch_array($result)){
                        for($i = 0; $i < count($row)/2; $i++){
                            if($i == 0){
                                print "<input type='hidden' name='id' value='$id'> <br>";
                            } else {
                                $ar =  $row[$i];
                                print $array[$i].": <input name='$array[$i]' size='50' type='text' value='$ar'> <br>";
                            }
                        }
                    }
                    echo("<input type='hidden' name='index' value='$index'> <br>");
                    echo("<input type='submit' value='Сохранить'/> <br>");
                    echo("</form>");
                    echo("</fieldset>");
                break;
                case "stock_info":
                    $index = "stock";
                    $queryTab_0 = "cars";
                    $queryTab_1 = "seller";
                    $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                    $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                    $query_2 = "SELECT * FROM $database.$index WHERE id='$id'";
                    $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                    $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                    $result_2 = mysqli_query($link, $query_2) or die("Не могу выполнить запрос!");
                    $rows = array();
                    while ($row=mysqli_fetch_array($result)){
                        $rows = $row;
                    }
                    
                    $rws = array();
                    while ($row=mysqli_fetch_array($result_2)){
                        $rws = $row;
                    }
                    
                    echo("<fieldset><legend>Изменить</legend>");
                    echo("<form id='form' method='post' action='save_edit.php'>");
                    
                    echo("<input type='hidden' name='id' value='$id'>");
                    $id_0 = "cars_select";
                    echo("<label for='$id_0'>Список машин: </label>");
                    echo("<select id='$id_0' name='$id_0'>");
                    echo("<option value=''>--Please choose an option--</option>");
                        
                    while ($row=mysqli_fetch_array($result_0)){
                        if($rws[1]==$row[0]){
                            echo("<option value='$row[0]' selected> $row[0] - $row[1] $row[2]</option>");
                        } else{
                            echo("<option value='$row[0]'> $row[0] - $row[1] $row[2]</option>");
                        }
                    }
                    echo("</select><br>");
                    
                    $id_1 = "seller_select";
                    echo("<label for='$id_1'>Список соответствующих значений: </label>");
                    echo("<select id='$id_1' name='$id_1'>");
                    echo("<option value=''>--Please choose an option--</option>");
                    
                    while ($row=mysqli_fetch_array($result_1)){
                        if($rws[2]==$row[0]){
                            echo("<option value='$row[0]' selected> $row[0] - $row[1] $row[2]</option>");
                        } else{
                            echo("<option value='$row[0]'> $row[0] - $row[1] $row[2]</option>");
                        }
                    }
                    echo("</select><br>");
                    
                    echo("<input type='hidden' name='index' value='$index'> <br>");
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