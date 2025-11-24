<?php
// item.php - mostra detalhes do item e permite adicionar ao carrinho com quantidade
include 'dados.php';
include 'header.php';

$menu = getMenuData();
$categoria = $_GET['categoria'] ?? '';
$id = intval($_GET['id'] ?? 0);

if (!isset($menu[$categoria])) {
    echo "<div class='alert alert-danger'>Categoria inválida!</div>";
    include 'footer.php';
    exit;
}

// encontra o item
$item = null;
foreach ($menu[$categoria] as $produto) {
    if ($produto['id'] == $id) {
        $item = $produto;
        break;
    }
}
if (!$item) {
    echo "<div class='alert alert-warning'>Item não encontrado.</div>";
    include 'footer.php';
    exit;
}

// Se o formulário for enviado para adicionar ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // quantidade enviada pelo usuário, default 1
    $q = intval($_POST['quantidade'] ?? 1);
    if ($q < 1) $q = 1;

    // inicializa carrinho se necessário
    if (!isset($_SESSION['carrinho'])) $_SESSION['carrinho'] = [];

    // procurar se já existe item igual (mesmo categoria e id)
    $found = false;
    foreach ($_SESSION['carrinho'] as &$citem) {
        if ($citem['id'] == $item['id'] && $citem['categoria'] == $categoria) {
            // incrementa quantidade (ou poderia sobrescrever dependendo do comportamento desejado)
            $citem['quantidade'] += $q;
            $found = true;
            break;
        }
    }
    unset($citem);

    if (!$found) {
        // adiciona novo item com quantidade
        $_SESSION['carrinho'][] = [
            'categoria' => $categoria,
            'id' => $item['id'],
            'nome' => $item['nome'],
            'preco' => $item['preco'],
            'imagem' => $item['imagem'],
            'quantidade' => $q
        ];
    }

    echo "<div class='alert alert-success'>✅ " . htmlspecialchars($item['nome']) . " adicionado(s) ao carrinho (x{$q}).</div>";
}
?>
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <img src="<?= htmlspecialchars($item['imagem']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['nome']) ?>">
      <div class="card-body">
        <h3><?= htmlspecialchars($item['nome']) ?></h3>
        <p class="text-muted"><?= htmlspecialchars($item['descricao']) ?></p>
        <p class="fs-5 text-primary fw-bold"><?= format_price($item['preco']) ?></p>
        <a href="cardapio.php?categoria=<?= htmlspecialchars($categoria) ?>" class="btn btn-secondary">Voltar</a>

        <!-- Formulário com seleção de quantidade -->
        <form method="post" class="d-inline ms-2">
          <label class="me-2">Quantidade:</label>
          <input type="number" name="quantidade" value="1" min="1" class="form-control d-inline-block" style="width:80px;">
          <button type="submit" class="btn btn-success float-end ms-2">🛒 Adicionar ao Carrinho</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
