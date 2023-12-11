<?php
declare (strict_types = 1);

// obtem da request o CEP
$cep = $_GET['cep'] ?? "01234-567";

function obterEstadoPorCEP(string $cep): string
{
    // Remova caracteres não numéricos do CEP
    $cep_tratado = (int) preg_replace('/[^0-9]/', '', $cep);

    return match (true) {
        ($cep_tratado >= 69900000 && $cep_tratado <= 69999999) => "Acre",
        ($cep_tratado >= 57000000 && $cep_tratado <= 57999999) => "Alagoas",
        ($cep_tratado >= 68900000 && $cep_tratado <= 68999999) => "Amapá",
        ($cep_tratado >= 69000000 && $cep_tratado <= 69299999) ||
        ($cep_tratado >= 69400000 && $cep_tratado <= 69899999) => "Amazonas",
        ($cep_tratado >= 40000000 && $cep_tratado <= 48999999) => "Bahia",
        ($cep_tratado >= 60000000 && $cep_tratado <= 63999999) => "Ceará",
        ($cep_tratado >= 70000000 && $cep_tratado <= 72799999) ||
        ($cep_tratado >= 73000000 && $cep_tratado <= 73699999) => "Distrito Federal",
        ($cep_tratado >= 29000000 && $cep_tratado <= 29999999) => "Espírito Santo",
        ($cep_tratado >= 72800000 && $cep_tratado <= 72999999) ||
        ($cep_tratado >= 73700000 && $cep_tratado <= 76799999) => "Goiás",
        ($cep_tratado >= 65000000 && $cep_tratado <= 65999999) => "Maranhão",
        ($cep_tratado >= 78000000 && $cep_tratado <= 78899999) => "Mato Grosso",
        ($cep_tratado >= 79000000 && $cep_tratado <= 79999999) => "Mato Grosso do Sul",
        ($cep_tratado >= 30000000 && $cep_tratado <= 39999999) => "Minas Gerais",
        ($cep_tratado >= 66000000 && $cep_tratado <= 68899999) => "Pará",
        ($cep_tratado >= 58000000 && $cep_tratado <= 58999999) => "Paraíba",
        ($cep_tratado >= 80000000 && $cep_tratado <= 87999999) => "Paraná",
        ($cep_tratado >= 50000000 && $cep_tratado <= 56999999) => "Pernambuco",
        ($cep_tratado >= 64000000 && $cep_tratado <= 64999999) => "Piauí",
        ($cep_tratado >= 20000000 && $cep_tratado <= 28999999) => "Rio de Janeiro",
        ($cep_tratado >= 59000000 && $cep_tratado <= 59999999) => "Rio Grande do Norte",
        ($cep_tratado >= 90000000 && $cep_tratado <= 99999999) => "Rio Grande do Sul",
        ($cep_tratado >= 76800000 && $cep_tratado <= 76999999) => "Rondônia",
        ($cep_tratado >= 69300000 && $cep_tratado <= 69399999) => "Roraima",
        ($cep_tratado >= 88000000 && $cep_tratado <= 89999999) => "Santa Catarina",
        ($cep_tratado >= 49000000 && $cep_tratado <= 49999999) => "Sergipe",
        ($cep_tratado >= 1000000 && $cep_tratado <= 19999999) => "São paulo",
        ($cep_tratado >= 77000000 && $cep_tratado <= 77999999) => "Tocantins",
        default => "Desconhecido"
    };
}

$estado = obterEstadoPorCEP($cep);
echo "O CEP $cep está no estado: $estado";
