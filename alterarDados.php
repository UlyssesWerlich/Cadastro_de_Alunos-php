<html>
<head>
    <meta charset="utf-8" />
    <title>Curso de PHP com MySQL</title>
    <link rel="stylesheet" href="estilo.css"/>

</head>

<body>
    <div id="cabecalho">
        <h1>Alterar dados de Aluno</h1>
    </div>

    <ul class="menu">
			<ul class="itens" id="menu1"><a href="paginaInicial.html">Página inicial</a></ul>
			<ul class="itens" id="menu1"><a href="consultarAluno.php">Consultar Alunos</a></ul>
    </ul>
<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$turma = $_POST['turma'];
$botao = $_POST['Botao'];

if ($botao == 'Cadastrar'){
	$turno = $_POST['turno'];
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=focus","root","password");
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	$inserir=$pdo->prepare("Insert into alunos(nome, endereco, turma, turno) Values('$nome', '$endereco', '$turma', '$turno');");
	$inserir->execute();
	$pdo = null;
	echo "<p>Aluno adicionado com sucesso</p>";

} elseif ($botao == 'Alterar'){
	$id_alunos = $_POST['id_alunos'];
	$turno = $_POST['turno'];
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=focus","root","password");
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	$inserir=$pdo->prepare("update alunos set nome='$nome', endereco='$endereco', turma='$turma', turno='$turno' where id_alunos = $id_alunos;");
	$inserir->execute();
	$pdo = null;
	echo "<p>Dados de aluno alterado com sucesso</p>";

} else {
	$id_alunos = $_POST['id_alunos'];
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=focus","root","password");
	} catch (PDOException $e){
		echo $e->getMessage();
	}
	$excluir = $pdo->prepare("delete from alunos where id_alunos = '$id_alunos'");
	$excluir->execute();
	$pdo = null;
	echo "<p>Aluno excluído com sucesso</p>";
}


	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';


?>

</body>
</html> 