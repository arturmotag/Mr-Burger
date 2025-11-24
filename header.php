<?php
// header.php - inicia sessão e mostra o menu com contador correto de itens (soma das quantidades)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Calcula a soma das quantidades no carrinho (se existir)
$cart_count = 0;
if (!empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $citem) {
        $cart_count += intval($citem['quantidade']);
    }
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mr. Burger - Cardápio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f1f3f5; }
        .card-img-top { height: 180px; object-fit: cover; }
        .navbar { box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">🍔 Mr. Burger</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a href="cardapio.php?categoria=hamburgueres" class="nav-link">Hambúrgueres</a></li>
      <li class="nav-item"><a href="cardapio.php?categoria=bebidas" class="nav-link">Bebidas</a></li>
      <li class="nav-item"><a href="cardapio.php?categoria=acompanhamentos" class="nav-link">Acompanhamentos</a></li>
      <li class="nav-item">
        <a href="carrinho.php" class="nav-link fw-bold text-primary">
          🛒 Carrinho (<?= $cart_count ?>)
        </a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
