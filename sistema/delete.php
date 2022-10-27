<?php
include 'connect.php';
$sq="delete from reg where id='$_SESSION[id]'"; //deleta a sessão criada
mysqli_query($con,$sq);
header('location:add_district.php'); //redireciona o usuário para a página que for selecionada
?>

