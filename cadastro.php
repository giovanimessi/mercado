<?php
session_start();
require 'config.php';

if(isset($_POST['matricula']) && empty($_POST) == false){
       $matricula = addslashes($_POST['matricula']);
	 $nome = addslashes($_POST['nome']);
    $sobrenome = addslashes($_POST['sobrenome']);
     
   

   $sql = "SELECT * FROM  usuario WHERE matricula = :matricula AND nome = :nome";
   $sql = $pdo->prepare($sql);
   $sql->bindValue(':matricula', $matricula);
      $sql->bindValue(':nome', $nome);

   $sql->execute();

   if($sql->rowCount() <= 0){
   	$sql = "INSERT INTO usuario (matricula,nome,sobrenome) values(:matricula,:nome,:sobrenome)";
          $sql = $pdo->prepare($sql);
             $sql->bindValue(':matricula', $matricula);
             $sql->bindValue(':nome', $nome);
             $sql->bindValue(':sobrenome', $sobrenome);
             $sql->execute();



   	unset($_SESSION['logado']);
   	header('Location:login.php');
   }else{
   	header("Location:Cadastro.php ");
   	echo "Preechar os dados";
   }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link href="assets/css/estilo.css" rel="Stylesheet">

	<title>Cadastro</title>
</head>
<body>
<div class="cada">
<form method="POST">
	<label>Matricula:</label><br>
	<input type="int" name="matricula" required=""><br><br>
    <label>Nome:</label><br>
	<input type="text" name="nome" required=""><br><br>
	<label>Sobrenome:</label><br>
	<input type="text" name="sobrenome" required=""><br><br>
	<input type="submit" value="Cadastrar">

</form>

</div>
</body>
</html>
