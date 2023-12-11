<?php
// Obtém o caminho do diretório atual
$dir = __DIR__;

// Obtém a lista de arquivos no diretório atual excluindo . e ..
$files = array_diff(scandir($dir), ['..', '.', 'index.php', 'sh-run-server.sh']);

// Inicia a construção do HTML
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Scripts PHP para trabalhar com CEP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-md mx-auto bg-white rounded overflow-hidden shadow-md">
    <div class="bg-gray-200 text-lg font-semibold p-4">
        Lista de Scripts PHP para trabalhar com CEP
    </div>
    <ul class="divide-y divide-gray-300">
';

// Itera sobre os arquivos e adiciona links para eles na lista
foreach ($files as $file) {
    // Verifica se o arquivo tem a extensão .php
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        $html .= '<li class="p-4"><a href="' . $file . '" class="text-blue-500 hover:underline hover:text-blue-900">' . str_replace(['.php', '_'], ['', ' '], $file) . '</a></li>';
    }
}

// Fecha as tags HTML
$html .= '</ul>
</div>

</body>
</html>';

// Imprime o HTML
echo $html;
