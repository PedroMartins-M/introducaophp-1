<?php

//Informe o End-point
$url = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios?orderBy=nome";

//inicializa uma sessão curl
//cURL: inicializar uma biblioteca do PHP usada para fazer requisições HTTP
$cURL = curl_init($url);

//configura as opções da requisição CURL
//- CURLOPT_RETURNTRANSFER: defini que o resultado da requisição será armazenado 
//  em uma variável
//- TRUE: ativa o compotamento 
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

//executa a requisição 
$response = curl_exec($cURL);

//fecha a conexão url e libera a memória do servidor
//Obsoleto  porque é desnecessária 
curl_close($cURL);

//transforma as informações em objetos que php consegue ler
//Transforma o JSON em uma array nomeada
$cidades = json_decode($response);

//percorrer a array
foreach ($cidades as $cid) {

    echo "<h3>$cid->nome</h3>";
    echo "ID Cidade: " . $cid->id . "<br>";

    echo "Microrregião: ";
    if ($cid->microrregiao != null) {
        echo $cid->microrregiao->nome . "<br>";

        echo "Mesorregião: ";
        echo $cid->microrregiao->mesorregiao->nome . "<br>";

        echo "UF: ";
        echo $cid->microrregiao->mesorregiao->UF->sigla . "<br>";
        echo "Estado: ";
        echo $cid->microrregiao->mesorregiao->UF->nome . "<br>";

        echo "Região: ";
        echo $cid->microrregiao->mesorregiao->UF->regiao->nome . "<br>";
    }
    echo "<hr>";
}
