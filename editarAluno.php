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
//$id = $_POST['id_alunos'];
$id_alunos = $_GET['id_alunos'];

try {
    $pdo =new PDO("mysql:host=localhost;dbname=focus","root", "password");
} catch (PDOException $e) {
    echo $e->getMessage();
}

    $consulta = $pdo->prepare("select * from alunos where id_alunos like '$id_alunos'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){
        $dataArray = explode("-", $row['dataNascimento']);
        $dataConvertida = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];

        echo "<div class='formulario'>
        <form name='form' method='POST' action='alterarDados.php'>";
        echo "<p>Id do aluno</p>
                <input type='text' name='id_alunos' value='$row[id_alunos]' readonly></p>";
        echo "<p>Nome<br/>
                <input type='text' name='nome' value='$row[nome]'></p>  
            <p>Endereço<br/>
                <input type='text' name='endereco' value='$row[endereco]'></p>  
            <p>Turma<br/>
                <input type='text' name='turma' value='$row[turma]'></p> 
            <p>Selecione o Turno:<br>
                <input class='campo' name='turno' type='radio' id='turno' value='manha'>Manhã
                <input class='campo' name='turno' type='radio' id='turno' value='tarde'>Tarde
                <input class='campo' name='turno' type='radio' id='turno' value='noite'>Noite</p>  
            <p>Data de nascimento:<br>
                <input type='text' name='dataNascimento' size='10' maxlength='10' minlength='10' value='$dataConvertida'> </p>
            </p>     
            <input type='submit' name='Botao' value='Alterar'>
            <input type='submit' name='Botao' value='Excluir'>
        </form>
    </div>";

    }

?>

</body>
</html>