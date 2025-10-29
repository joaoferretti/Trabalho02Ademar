Programa de Fidelidade

Desenvolvido por: João Pedro Pires Ferretti @joaoferretti
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

Como o programa funciona / Funções Principais 

O valor é enviado via formulário POST pelo frontend para o backend. O campo do valor da compra envia o valor de tipo inteiro e o select envia o tipo de compra em string
A sessão é iniciada e verifica se já existe transações no histórico
ele valida se o valor é numérico positivo na função valida valor

validarValor($valor)
	Verifica se a entrada é numérica e positiva

ele calcula os pontos que recebe transformando a string em multiplicador segundo a tabela de regra e então multiplica o valor

calcularPontos($transacao)	
    Retorna pontos baseados na categoria

adiciona a transação no array de transações que serve como histórico
verifica e exclui os pontos de compras que foram compradas a mais de 30 dias

expirarPontos($transacoes)	
    Remove pontos com mais de 30 dias

Adiciona os valores da compra ao valor já armazenado

somarPontos($transacoes)	
    Soma pontos válidos com reduce

Com o valor novo determina o tier entre ouro  com a função determinar tier(mais ou igual a 1000 pontos), prata (mais ou igual a 500 pontos) e bronze ( menos de 500)

determinarTier($pontosTotais)	
    Define o tier com base no total acumulado

Regras de Negócio

Pontos nunca ficam negativos
Cada categoria tem uma taxa de multiplicação:

Geral → 1x
Eletrônicos → 2x
Roupas → 1.5x
Alimentos → 1x
Expiração automática após 30 dias

Tier:

Bronze - até 499 pontos
Prata - 500–999 pontos
Ouro - 1000+ pontos

Exemplos de Entrada e Saída

Entrada: 100
Categoria: Eletrônicos
Saida: Compra registrada! Pontos ganhos: 200 | Tier atual: Bronze

Entrada: 300, 400, 500
Categoria: Roupas, Geral, Eletrônicos
Saida: Compra registrada! Pontos ganhos: 200 | Tier atual: Bronze

Como iniciar 

Pré-requisitos
PHP instalado (versão 7.4 ou superior)
Navegador (Chrome, Edge, Firefox, etc.)

Salva os arquivos dentro da pasta htdocs do XAMPP
C:\xampp\htdocs\programa-fidelidade\
Depois, inicia o servidor:
cd C:\xampp\htdocs\programa-fidelidade
php -S localhost:8000
Acesse no navegador:
http://localhost:8000

Desenvolvido por
João Pedro Pires Ferretti
