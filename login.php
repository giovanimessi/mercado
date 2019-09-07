    <?php

session_start();
require 'config.php';

if(!empty($_POST['matricula'])){

$matricula = addslashes($_POST['matricula']);
$nome = addslashes($_POST['nome']);

 $sql ="SELECT id FROM usuario WHERE matricula = '$matricula' AND nome = '$nome'";
 $sql = $pdo->query($sql);

 if($sql->rowCount() > 0){

    $dado = $sql->fetch();

    $_SESSION['logado'] = $dado['id'];
     
     header("Location: menu.php");
     unset($_SESSION['logado']);
     exit;

 }
 if (!isset($_SESSION)) session_start();
    
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['matricula'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: cadastro.php"); exit;
  }




}
       

?>
<link href="assets/css/estilo.css" rel="Stylesheet">
<div  class="form-log">
<form method="POST">

  <label>Matricula:</label><br>
  <input type="int" name="matricula" required=""><br><br>
  <label>Nome:</label><br>
  <input type="text" name="nome" required=""><br><br>

  <input type="submit" value="Acessar"  />
  
</form>

</div>