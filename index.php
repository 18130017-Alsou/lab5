<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
		<?
            /*echo("<div>");
            echo("<div><p><i> <a href='/lab5/info.php?Index="."cars"."'> Показать таблицу машину</a> </i></p> </div>");
            echo("<div><p><i> <a href='/lab5/info.php?Index="."seller"."'> Показать таблицу автосалонов</a> </i></p> </div>");
            echo("<div><p><i> <a href='/lab5/info.php?Index="."stock"."'> Показать таблицу автомобили в наличии</a> </i></p> </div>");
            echo("</div>");*/
            $queryTab = "cars";
            $headText = "Таблица машин";
            $arrayTitle = array("№","Марка", "Модель", "Год выпуска", "Трансмиссия", "Объем выпуска", "Стоимость", "Изменить", "Добавить");
            $query = "SELECT id, brand, model, DATE_FORMAT(year, '%d.%m.%Y'), transmission, production_volume, cost FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            
            $queryTab = "seller";
            $headText = "Таблица автосалонов";
            $arrayTitle = array("№","Название", "Адресс", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            
            $queryTab = "stock_info";
            $headText = "Автомобили в наличии";
            $arrayTitle = array("№","Автомобиль", "Автосалон", "Цена",  "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            
            /*$queryTab = "model_count_info";
            $headText = "Количество автомобилей в автосалонах";
            $arrayTitle = array("Автомобиль", "Количество");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, false);
            echo("</div>");*/
            
            echo("<div>");
            echo("<div><p><i> <a href='/lab5/gen_pdf.php'> Показать pdf </a> </i></p> </div>");
            echo("<div><p><i> <a href='/lab5/gen_xls.php'> Показать xls </a> </i></p> </div>");
            echo("</div>");

            echo("<div>");
            echo("<div><p><i> <a href='/lab5/new.php?Index="."cars"."'> Добавить новую машину</a> </i></p> </div>");
            echo("<div><p><i> <a href='/lab5/new.php?Index="."seller"."'> Добавить новый автосалон</a> </i></p> </div>");
            echo("<div><p><i> <a href='/lab5/new.php?Index="."stock"."'> Добавить новый автомобиль в салон</a> </i></p> </div>");
            echo("</div>");
            echo("<div>");
            echo("</div>");
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>