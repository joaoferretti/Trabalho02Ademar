Programa de Fidelidade

Desenvolvido por: João Pedro Pires Ferretti
Disciplina: Linguagem de Paradigmas
Tema: Programa de Fidelidade (pontos, tiers e expiração)

Este projeto implementa um Programa de Fidelidade utilizando PHP e conceitos da programação funcional.
O sistema permite registrar compras, calcular pontos com base em categorias, determinar o tier do usuário (Bronze, Prata, Ouro) e expirar pontos automaticamente após 30 dias.

Funcionalidades

Registro de transações de compra
Cálculo automático de pontos por categoria
Atualização automática de tier (Bronze / Prata / Ouro)
Expiração de pontos com mais de 30 dias
Validação funcional de entradas
Exibição de histórico de transações válidas

Conceitos de programação funcional utilizados 
Funções puras -> Todas as funções não modificam o estado global nem variáveis externas.
Imutabilidade -> As listas de transações nunca são alteradas diretamente; novas versões são criadas com array_merge e array_values.
Funções de ordem superior -> Uso de array_filter e array_reduce para filtrar e somar pontos.
Composição funcional -> As funções se encadeiam para processar os dados de forma previsível e independente.

Funções Principais
Função	Descrição
validarValor($valor)
	Verifica se a entrada é numérica e positiva
calcularPontos($transacao)	
    Retorna pontos baseados na categoria
determinarTier($pontosTotais)	
    Define o tier com base no total acumulado
expirarPontos($transacoes)	
    Remove pontos com mais de 30 dias
somarPontos($transacoes)	
    Soma pontos válidos com reduce

📄 Regras de Negócio

Pontos nunca ficam negativos
Cada categoria tem uma taxa de multiplicação:

Geral → 1x
Eletrônicos → 2x
Roupas → 1.5x
Alimentos → 1x

Expiração automática após 30 dias

Tier:

Bronze → até 499 pontos
Prata → 500–999 pontos
Ouro → 1000+ pontos


Exemplos de Entrada e Saída

Entrada: 100
Categoria: Eletrônicos
Saida: Compra registrada! Pontos ganhos: 200 | Tier atual: Bronze

Entrada: 300, 400, 500
Categoria: Roupas, Geral, Eletrônicos
Saida: Compra registrada! Pontos ganhos: 200 | Tier atual: Bronze

Desenvolvido por
João Pedro Pires Ferretti