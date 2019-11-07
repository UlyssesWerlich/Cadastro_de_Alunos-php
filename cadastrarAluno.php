<html>
<head><title>Curso de PHP</title>
</head>
<body>

<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$turma = $_POST['turma'];
$turno = $_POST['turno'];

	echo "Start!<br/>";
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=focus","root","password");
		echo "Deu certo";
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	$inserir=$pdo->prepare("Insert into alunos(nome, endereco, turma, turno) Values('$nome', '$endereco', '$turma', '$turno');");
	$inserir->execute();
	$pdo = null;

	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';


?>


<p><font face="Arial, Helvetica, sans-serif" size="4">
<a href="form1.html">Clique aqui para voltar ao formul&aacute;rio.</a>
</font>
</body>
</html> 

 