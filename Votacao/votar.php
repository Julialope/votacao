<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Sistema de Votação</title>
</head>
<body class="bg-body-secondary">
	<div class="container text-center bg-white">
	<div class="row">   
            <div class="col bg-primary">
                <nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
                <div class="container-fluid">
				<div class="mb-3" align="left">
                        <a class="navbar-brand" href="#"> VOTAÇÃO</a>
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
                     </button>
                    
                        </div>
                    </div>
                  </div>
                </nav>
            </div> 
            </body>
</html>
<?php
// Verifica o formulário e se foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Verifica se a opção escolhida é válida
	if (isset($_POST["curso"]) && in_array($_POST["curso"], ["quimica","informatica","desinvolvimento","admnistracao"])) {
		// Lê o arquivo de votos
		$votar = file_get_contents("votar.txt");
		// Converte o conteúdo do arquivo para um array
		$votar = json_decode($votar, true);
		// Incrementa o contador da opção escolhida
		$votar[$_POST["curso"]] += 1;
		// Salva o array no arquivo de votos
		file_put_contents("votar.txt", json_encode($votar));
	}
}

// lendo os arquivos de votos
$votar = file_get_contents("votar.txt");
// Converte o conteúdo do arquivo para um array
$votar = json_decode($votar, true);

// Exibe os resultados
echo "<h1>Resultados das votações:</h1>";
foreach ($votar as $curso => $votar) {
	echo "<p>$curso: $votar votos</p>";
}
