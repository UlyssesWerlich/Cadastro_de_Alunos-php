<html>
<head>
    <meta charset="utf-8" />
    <title>Curso de PHP com MySQL</title>
    <link rel="stylesheet" href="estilo.css"/>

</head>

<body>
    <div id="cabecalho">
        <h1>Consulta de Aluno</h1>
    </div>
    <ul class="menu">
            <ul class="itens" id="menu1"><a href="paginaInicial.html">Tela inicial</a></ul>
</ul>
<?php

	try{
		$pdo=new PDO("mysql:host=localhost;dbname=focus","root","password");
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	$consultar=$pdo->prepare("select * from alunos");
    $consultar->execute();

// quarta forma
$result = $consultar->fetchAll();
echo "<table border='1'>
        <caption>Alunos</caption>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Endereço</td>
                <td>Turma</td>
                <td>Turno</td>
            </tr>";
foreach ($result as $row) {
    echo "<tr>
            <td><a href=editarAluno.php?id_alunos=$row[id_alunos]>$row[id_alunos]</a></td>
            <td>$row[nome]</td>
            <td>$row[endereco]</td>
            <td>$row[turma]</td>
            <td>$row[turno]</td>
        </tr>";
}
echo "</table>";

$pdo = null;
    
// primeira forma	
/*$result = $consultar->fetch(PDO::FETCH_ASSOC);
echo $result['nome'].'<br />';*/

// segunda forma
/*$result = $consultar->fetchAll(PDO::FETCH_ASSOC);
print_r($result);*/
 
/* terceira forma
$result = $consultar->fetch(PDO::FETCH_OBJ);
echo $result->nome;
echo $result->endereco;*/

?>
</body>
</html>
