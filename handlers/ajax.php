<?php
session_start();
// include("../DB/config_chat.php");
include("../DB/config_chat.php");

if (isset($_REQUEST['action'])) {
	switch ($_REQUEST['action']) {
		case "SendMessage":
			session_start();
			$query = $db->prepare("INSERT INTO chat SET user=?, message=?");
			$query->execute([$_SESSION['login'], $_REQUEST['message']]);
			echo 1;
			break;

		case "getChat":

			$query = $db->prepare("SELECT * from chat WHERE ((user='$_SESSION[login]') or (user='user2'))");
			$query->execute();
			$rs = $query->fetchAll(PDO::FETCH_OBJ);

			$chat = '';
			foreach ($rs as $r) {
				$chat .=  '<div class="siglemessage"><strong>' . $r->user . ' : </strong>' . $r->message . '</div>';
			}

			echo $chat;
			break;
	}
}
