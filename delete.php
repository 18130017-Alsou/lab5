<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
			if(isset($_GET['id'])&&isset($_GET['query'])){
                $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['query']));
                if($index=="stock_info"){
                    $index = "stock";
                }
                $query = "DELETE FROM $database.$index WHERE id='$id'";
                $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                header("Location: info.php?Index=$index");
			}
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>