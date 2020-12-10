<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
		<?
            if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "cars":
                        $queryTab = "cars";
                        $headText = "Таблица машин";
                        $arrayTitle = array("№","Марка", "Модель", "Год выпуска", "Трансмиссия", "Объем выпуска", "Стоимость", "Изменить", "Добавить");
                        $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        echo("<div>");
                        $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
                        echo("</div>");
                    break;
                    case "seller":
                        $queryTab = "seller";
                        $headText = "Таблица автосалонов";
                        $arrayTitle = array("№","Название", "Адресс", "Изменить", "Добавить");
                        $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        echo("<div>");
                        $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
                        echo("</div>");
                    break;
                    case "stock":
                        $queryTab = "stock_info";
                        $headText = "Автомобили в наличии";
                        $arrayTitle = array("№","Автомобиль", "Автосалон", "Цена",  "Изменить", "Добавить");
                        $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        echo("<div>");
                        $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
                        echo("</div>");
                    break;
                }
                echo "<p><a href=\"index.php\"> Назад</a>";
			}
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>