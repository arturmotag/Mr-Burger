<?php
// carrinho.php - lista itens com quantidades, permite atualizar/remover/esvaziar e mostra total
include 'dados.php';
include 'header.php';

$carrinho = $_SESSION['carrinho'] ?? [];

// Ações: atualizar quantidade (via POST), remover item (via GET), limpar carrinho (via GET)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'atualizar') {
    // dados enviados: index e quantidade
    $index = intval($_POST['index']);
    $qtd = intval($_POST['quantidade']);
    if ($qtd < 1) $qtd = 1;

    if (isset($_SESSION['carrinho'][$index])) {
        $_SESSION['carrinho'][$index]['quantidade'] = $qtd;
    }
    header("Location: carrinho.php");
    exit;
}

if (isset($_GET['remover'])) {
    $rem = intval($_GET['remover']);
    if (isset($_SESSION['carrinho'][$rem])) {
        unset($_SESSION['carrinho'][$rem]);
        // reorganiza índices
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    }
    header("Location: carrinho.php");
    exit;
}

if (isset($_GET['limpar'])) {
    unset($_SESSION['carrinho']);
    header("Location: carrinho.php");
    exit;
}

// reload carrinho da sessão
$carrinho = $_SESSION['carrinho'] ?? [];

echo "<h2 class='mb-4'>🛒 Seu Carrinho</h2>";

if (empty($carrinho)) {
    echo "<div class='alert alert-info'>Seu carrinho está vazio.</div>";
    echo "<a href='index.php' class='btn btn-primary'>Voltar ao cardápio</a>";
    include 'footer.php';
    exit;
}

$total = 0;
?>
<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>Produto</th>
      <th style="width:120px">Quantidade</th>
      <th style="width:140px">Preço unit.</th>
      <th style="width:140px">Subtotal</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($carrinho as $index => $item): 
        $subtotal = $item['preco'] * $item['quantidade'];
        $total += $subtotal;
    ?>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img src="<?= htmlspecialchars($item['imagem']) ?>" alt="" style="width:72px;height:56px;object-fit:cover;border-radius:6px;margin-right:12px;">
            <div>
              <div class="fw-bold"><?= htmlspecialchars($item['nome']) ?></div>
              <div class="text-muted small"><?= htmlspecialchars($item['categoria']) ?></div>
            </div>
          </div>
        </td>
        <td>
          <!-- Form para atualizar quantidade (envia por POST) -->
          <form method="post" class="d-flex align-items-center">
            <input type="hidden" name="action" value="atualizar">
            <input type="hidden" name="index" value="<?= $index ?>">
            <input type="number" name="quantidade" min="1" value="<?= intval($item['quantidade']) ?>" class="form-control" style="width:90px;">
            <button type="submit" class="btn btn-sm btn-outline-secondary ms-2">Atualizar</button>
          </form>
        </td>
        <td><?= format_price($item['preco']) ?></td>
        <td><?= format_price($subtotal) ?></td>
        <td>
          <a href="carrinho.php?remover=<?= $index ?>" class="btn btn-sm btn-outline-danger">Remover</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="d-flex justify-content-between align-items-center">
  <div>
    <a href="cardapio.php?categoria=hamburgueres" class="btn btn-secondary">Continuar comprando</a>
    <a href="carrinho.php?limpar=1" class="btn btn-danger">Esvaziar carrinho</a>
  </div>
  <div class="text-end">
    <div class="fw-bold fs-4 text-success">Total: <?= format_price($total) ?></div>
    <button class="btn btn-primary mt-2">Finalizar Pedido</button>
  </div>
</div>

<?php include 'footer.php'; ?>
