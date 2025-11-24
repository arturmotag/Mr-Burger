<?php
include 'dados.php';
include 'header.php';

$menu = getMenuData();
$categoria = $_GET['categoria'] ?? 'hamburgueres';

if (!isset($menu[$categoria])) {
    echo "<div class='alert alert-danger'>Categoria inválida!</div>";
    include 'footer.php';
    exit;
}

echo "<h2 class='mb-4 text-capitalize'>" . htmlspecialchars($categoria) . "</h2>";
echo "<div class='row g-4'>";

foreach ($menu[$categoria] as $item) {
    echo "
    <div class='col-12 col-md-4'>
      <div class='card h-100 shadow-sm'>
        <img src='{$item['imagem']}' class='card-img-top' alt='{$item['nome']}'>
        <div class='card-body d-flex flex-column'>
          <h5 class='card-title'>{$item['nome']}</h5>
          <p class='text-muted small mb-3'>{$item['descricao']}</p>
          <div class='mt-auto d-flex justify-content-between align-items-center'>
            <div class='fw-bold text-primary'>" . format_price($item['preco']) . "</div>
            <a href='item.php?id={$item['id']}&categoria={$categoria}' class='btn btn-outline-primary btn-sm'>Ver</a>
          </div>
        </div>
      </div>
    </div>
    ";
}
echo "</div>";

include 'footer.php';
?>
