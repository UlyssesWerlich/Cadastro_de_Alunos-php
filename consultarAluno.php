<?php
    $tituloCabecalho = "Consulta de aluno";
    include('cabecalho.php');

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
                <td>Data de Nascimento</td>
            </tr>";
foreach ($result as $row) {
    $dataArray = explode("-", $row['dataNascimento']);
    $dataConvertida = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];
    
    echo "<tr>
            <td><a href=editarAluno.php?id_alunos=$row[id_alunos]>$row[id_alunos]</a></td>
            <td>$row[nome]</td>
            <td>$row[endereco]</td>
            <td>$row[turma]</td>
            <td>$row[turno]</td>
            <td>$dataConvertida</td>
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
