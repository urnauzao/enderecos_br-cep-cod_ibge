<?php

declare (strict_types = 1);

header('Content-Type: application/json; charset=utf-8');

function gerarCEP(): array
{
    // Região: 01 a 09 (exemplo)
    $regiao = str_pad((string) random_int(1, 89), 2, '0', STR_PAD_LEFT);

    // Sub-região: 001 a 999 (exemplo)
    $subregiao = str_pad((string) random_int(1, 999), 3, '0', STR_PAD_LEFT);

    // Distribuição local: 001 a 999 (exemplo)
    $local = str_pad((string) random_int(1, 999), 3, '0', STR_PAD_LEFT);

    // CEP gerado
    $cep = $regiao . $subregiao . $local;
    // CEP formatado
    $cep_formated = $regiao . "." . $subregiao . "-" . $local;

    return ["cep" => $cep, "cep_formated" => $cep_formated];
}

// Exemplo de uso
$novoCEP = gerarCEP();
echo json_encode(["resultado" => $novoCEP], JSON_UNESCAPED_UNICODE);
