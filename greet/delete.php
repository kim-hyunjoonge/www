<?
   session_start();

   //$num=1

   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);
   include "../lib/dbconn.php";

   $sql = "delete from greet where num = $num"; //넘어온 $num을 delete from greet where num으로 삭제한다.
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	    location.href = 'list.php';
	   </script>
	";
?>

