<?php

//recebe o cep do formulário
$cep = $_POST["cep"];

//url da api
$url = "https://viacep.com.br/ws/$cep/json/";

$cURL = curl_init($url);

curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($cURL);

curl_close($cURL);

$cep = json_decode($response);

if (isset($cep->erro)) 
{
    echo "CEP não encontrado.";
} else
{
    echo "<h3>CEP: $cep->cep</h3>";
    echo "Logradouro: $cep->logradouro <br>";
    echo "Complemento: $cep->complemento <br>";
    echo "Unidade: $cep->unidade <br>";
    echo "Bairro: $cep->bairro <br>";
    echo "Localidade: $cep->localidade <br>";
    echo "UF: $cep->uf <br>";
    echo "Estado: $cep->estado <br>";
    echo "Região: $cep->ibge <br>";
    echo "ibge: $cep->ibge <br>";
    echo "GIA: $cep->gia <br>";
    echo "DDD: $cep->ddd <br>";
    echo "Siafi: $cep->siafi <br>";
}
