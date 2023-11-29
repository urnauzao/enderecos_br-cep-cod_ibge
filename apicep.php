<?php
declare (strict_types = 1);

header('Content-Type: application/json; charset=utf-8');

// obtem da request o CEP
$cep = $_GET['cep'] ?? "13218-521";

function repositoryApiCEP(string $cep): array | null
{

    // URL da API VIACEP
    $url = "https://cdn.apicep.com/file/apicep/{$cep}.json";

    // Inicializar cURL
    $ch = curl_init();

    // Configurar as opções do cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Executar a requisição e obter a resposta
    $conteudo = curl_exec($ch);

    // Verificar se a requisição foi bem-sucedida
    if ($conteudo === false) {
        return null;
    }

    // Decodificar o JSON retornado pela API
    $dados = json_decode($conteudo, true);

    // Verificar se o CEP é válido
    if (isset($dados['erro'])) {
        return null;
    }

    // Fechar a sessão cURL
    curl_close($ch);

    return $dados;
}

$result = repositoryApiCEP($cep);
echo json_encode($result);