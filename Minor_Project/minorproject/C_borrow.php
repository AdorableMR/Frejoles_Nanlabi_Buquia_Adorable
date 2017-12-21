<?php
require('server.php');
if(empty($_SESSION['username'])) {
	header('location: login.php');
}
?>
<?php
if(isset($_POST['C_borrow1'])){
	$C_borrow1 = "If You Give a Mouse a Cookie";
	$C_author1 = "Laura Joffe Numeroff";
	$sql = "INSERT INTO borrowed_children_stories (id,name,author)
			VALUES (NULL, '$C_borrow1','$C_author1')";
}
?>
<?php
if(isset($_POST['C_borrow2'])){
	$C_borrow2 = "The Cat in the Hat";
	$C_author2 = "Dr. Seuss";
	$sql = "INSERT INTO borrowed_children_stories (id,name,author)
			VALUES (NULL, '$C_borrow2','$C_author2')";
}
?>
<?php
if(isset($_POST['C_borrow3'])){
	$C_borrow3 = "Love You Forever";
	$C_author3 = "Robert Munsch, Sheila McGraw (Illustrator)";
	$sql = "INSERT INTO borrowed_children_stories (id,name,author)
			VALUES (NULL, '$C_borrow3','$C_author3')";
}
?>
<?php
if(isset($_POST['C_borrow4'])){
	$C_borrow4 = "Charlotte's Web";
	$C_author4 = " E.B. White, Garth Williams (Illustrator), Rosemary Wells (Illustrations)";
	$sql = "INSERT INTO borrowed_children_stories (id,name,author)
			VALUES (NULL, '$C_borrow4','$C_author4')";
}
?>