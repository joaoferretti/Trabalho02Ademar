<?php

//A função de validação deve ser implementada como uma função pura, retornando um valor booleano ou uma mensagem de erro. 1,5
function validarValor($valor) {
    return is_numeric($valor) && $valor > 0;
}

// Calcular os pontos com base nas regras
function calcularPontos($transacao) {
    $categoria = $transacao['categoria'];
    $valor = $transacao['valor'];

    $taxas = [
        'geral' => 1,
        'eletronicos' => 2,
        'roupas' => 1.5,
        'alimentos' => 1
    ];

    $taxa = $taxas[$categoria] ?? $taxas['geral'];
    $pontos = $valor * $taxa;

    return [
        'valor' => $valor,
        'categoria' => $categoria,
        'pontos' => $pontos,
        'data' => date('Y-m-d')
    ];
}

// Função para determinar o tier
function determinarTier($pontosTotais) {
    if ($pontosTotais >= 1000) return 'Ouro';
    if ($pontosTotais >= 500) return 'Prata';
    return 'Bronze';
}

// Função para expirar os pontos após 30 dias
function expirarPontos($transacoes) {
    $hoje = strtotime(date('Y-m-d'));
    // O uso de funções de ordem superior como map, filter ou reduce deve ser evidente no código
    $validas = array_filter($transacoes, function($t) use ($hoje) {
        $dias = ($hoje - strtotime($t['data'])) / (60 * 60 * 24);
        return $dias <= 30;
    });
    return array_values($validas);
}

// Função para somar os pontos
function somarPontos($transacoes) {
    // O uso de funções de ordem superior como map, filter ou reduce deve ser evidente no código
    return array_reduce($transacoes, function($acc, $t) {
        return $acc + $t['pontos'];
    }, 0);
}

session_start();
if (!isset($_SESSION['transacoes'])) {
    $_SESSION['transacoes'] = [];
}

$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'] ?? 0;
    $categoria = $_POST['categoria'] ?? 'geral';

    if (validarValor($valor)) {
        $novaTransacao = calcularPontos(['valor' => $valor, 'categoria' => $categoria]);

        // Usando um array para salvar por causa da imutabilidade
        $_SESSION['transacoes'] = array_merge($_SESSION['transacoes'], [$novaTransacao]);

        $transacoesValidas = expirarPontos($_SESSION['transacoes']);
        $pontosTotais = somarPontos($transacoesValidas);
        $tier = determinarTier($pontosTotais);

        $mensagem = "Compra registrada! Pontos ganhos: {$novaTransacao['pontos']} | Tier atual: $tier";
    } else {
        $mensagem = "Valor inválido. Digite um número positivo.";
    }
}

$transacoesAtuais = expirarPontos($_SESSION['transacoes']);
$pontosTotais = somarPontos($transacoesAtuais);
$tierAtual = determinarTier($pontosTotais);