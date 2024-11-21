<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Signo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
    <?php include 'layouts/header.php'; ?>

    <div class="container text-center mt-5">
        <?php
        function verificarSigno($dataNascimento, $signos) {
            $nascimento = DateTime::createFromFormat('Y-m-d', $dataNascimento);
            $diaNascimento = (int)$nascimento->format('d');
            $mesNascimento = (int)$nascimento->format('m');

            foreach ($signos->signo as $signo) {
                $dataInicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
                $dataFim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

                if (!$dataInicio || !$dataFim) {
                    continue;
                }

                $diaInicio = (int)$dataInicio->format('d');
                $mesInicio = (int)$dataInicio->format('m');
                $diaFim = (int)$dataFim->format('d');
                $mesFim = (int)$dataFim->format('m');

                if (
                    ($mesNascimento == $mesInicio && $diaNascimento >= $diaInicio) || 
                    ($mesNascimento == $mesFim && $diaNascimento <= $diaFim) || 
                    ($mesInicio > $mesFim && ($mesNascimento > $mesInicio || $mesNascimento < $mesFim))
                ) {
                    return $signo;
                }
            }
            return null;
        }

        $signos = simplexml_load_file('signos.xml');
        $dataNascimento = $_POST['birthdate'];

        $signoEncontrado = verificarSigno($dataNascimento, $signos);

        if ($signoEncontrado): ?>
            <div class="result-container">
                <h1><?php echo htmlspecialchars($signoEncontrado->signoNome); ?></h1>
                <p><?php echo htmlspecialchars($signoEncontrado->descricao); ?></p>
            </div>
        <?php else: ?>
            <div class="result-container">
                <h1>Erro</h1>
                <p>Signo não encontrado para a data fornecida.</p>
            </div>
        <?php endif; ?>
        <a href="index.php" class="btn btn-secondary mt-4">Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
