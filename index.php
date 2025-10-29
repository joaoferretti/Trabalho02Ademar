<?php require 'controller.php'; ?>
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Programa de Fidelidade</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Programa de Fidelidade</h1>
    <div class="container">
        <form method="POST">
            <label>Valor da compra:</label>
            <input type="number" name="valor" step="0.01" required>
            <label>Categoria:</label>
            <select name="categoria">
                <option value="geral">Geral</option>
                <option value="eletronicos">Eletrônicos</option>
                <option value="roupas">Roupas</option>
                <option value="alimentos">Alimentos</option>
            </select>
            <button type="submit">Registrar compra</button>
        </form>
    </div>
    <div class="mensagem"><?= htmlspecialchars($mensagem) ?></div>
    <h2>Resumo</h2>
    <p><strong>Total de pontos:</strong> <?= $pontosTotais ?></p>
    <p><strong>Tier atual:</strong> <?= $tierAtual ?></p>
    <h2>Histórico de Transações</h2>
    <table>
        <tr>
            <th>Data</th>
            <th>Categoria</th>
            <th>Valor (R$)</th>
            <th>Pontos</th>
        </tr>
        <?php foreach ($transacoesAtuais as $t): ?>
            <tr>
                <td><?= $t['data'] ?></td>
                <td><?= ucfirst($t['categoria']) ?></td>
                <td><?= number_format($t['valor'], 2, ',', '.') ?></td>
                <td><?= $t['pontos'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <footer>
        Desenvolvido por: João Pedro Pires Ferretti
    </footer>
</body>
</html>