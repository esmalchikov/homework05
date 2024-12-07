<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

</head>
<body>
<?

if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo "<pre>"; //Тег, который используется для отображения предварительно отформатированного текста
var_dump($_REQUEST); //Функция, которая используется для вывода структуры переменной, в даном случае массива $_REQUEST, который содержит все данные, полученные методом HTTP-запроса (например из формы)
echo "</pre>"; //Закрытие тега 

$arUserInfo = array(
	"name"=>$_REQUEST['user_name'] ?? '', 
	"second_name"=>$_REQUEST['user_second_name'] ?? '',
	"last_name"=>$_REQUEST['user_last_name'] ?? '',
	"city"=>$_REQUEST['user_city'] ?? '',
	"street"=>$_REQUEST['user_street'] ?? '',
	"house"=>$_REQUEST['user_house'] ?? '',
	"apartment"=>$_REQUEST['user_apartment'] ?? '',
);

$strUserInfo = json_encode($arUserInfo, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); //  Конвертация массива `$arUserInfo` в формат JSON и вывод его в удобно читаемом виде.
echo $strUserInfo; //Выводим только если есть данные
} else {
	echo "Форма еще не отправлена.";
	$strUserInfo = '';
}
?>

	<form action="" method="POST">
    	<strong>Ваше имя<span class="mf-req">*</span></strong><br>
    	<input type="text" name="user_name" id="user_name" value=""><br>

    	<strong>Ваше отчество<span class="mf-req">*</span></strong><br>
    	<input type="text" name="user_second_name" id="user_second_name" value=""><br>

    	<strong>Ваша фамилия<span class="mf-req">*</span></strong><br>
    	<input type="text" name="user_last_name" id="user_last_name" value=""><br>

    	<strong>Ваш адрес</strong><br>
    	<strong>Город<span class="mf-req">*</span></strong><br>
    	<input type="text" name="user_city" id="user_city" value=""><br>

    	<strong>Улица<span class="mf-req">*</span></strong><br>
    	<input type="text" name="user_street" id="user_street" value=""><br>

    	<strong>Дом<span class="mf-req">*</span></strong><br>
    	<input type="text" name="user_house" id="user_house" value=""><br>

    	<strong>Квартира<span class="mf-req">*</span></strong><br>
    	<input type="text" name="user_apartment" id="user_apartment" value=""><br>

    	<input type="submit" name="submit" id="submit" value="Отправить">
    </form>


<div id="result">
	<?  $strUserInfo ?>  <!-- Эхо-вывод значения переменной `$strUserInfo`, содержащей JSON-представление данных пользователя. -->
</div>
</body>
</html>