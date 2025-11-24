<?php
// data.php — contém os dados de todas as categorias

function getMenuData() {
    return [
        'hamburgueres' => [
            ['id' => 1, 'nome' => 'Mr. Burger Clássico', 'descricao' => 'Pão Caseiro, 2 carnes smash de 60g, tomate, cebola, picles, queijo & molho da casa.', 'preco' => 22.90, 'imagem' => 'img/classico.jpg'],
            ['id' => 2, 'nome' => 'Mr. Burger Salada', 'descricao' => 'Pão Tradicional, 150g de Carne, Queijo Mussarela, Alface, Tomate, Cebola & molho verde.', 'preco' => 22.90, 'imagem' => 'img/salada.jpg'],
            ['id' => 3, 'nome' => 'Mr. Burger Chicken', 'descricao' => 'Pão Caseiro, Frango Crispy, Cheddar, Tomate, Alface & molho da casa.', 'preco' => 26.90, 'imagem' => 'img/frango.jpg'],
            ['id' => 4, 'nome' => 'Mr. Burger Gorgonzola', 'descricao' => 'Pão Caseiro, 180g de Carne, Queijo Gorgonzola, Tomate, Alface & Molho da casa.', 'preco' => 26.90, 'imagem' => 'img/gorgonzola.jpg'],
            ['id' => 5, 'nome' => 'Mr. Burger da Casa', 'descricao' => 'Pão Especial, 200g de Carne, Bacon, Queijo, Alface, Tomate e Molho da Casa.', 'preco' => 29.90, 'imagem' => 'img/casa.jpg'],
            ['id' => 6, 'nome' => 'Mr. Burger Costela', 'descricao' => 'Pão Tradicional, 200g de Carne de Costela, Cebola Crispy e Molho Barbecue.', 'preco' => 32.50, 'imagem' => 'img/costela.jpg'],
        ],
        'bebidas' => [
            ['id' => 101, 'nome' => 'Refrigerante', 'descricao' => 'Lata 350ml (Coca-Cola, Guaraná, Sprite ou Pepsi).', 'preco' => 6.00, 'imagem' => 'img/refri.jpg'],
            ['id' => 102, 'nome' => 'Suco Natural', 'descricao' => 'Sabores: Laranja, Morango, Abacaxi ou Limão.', 'preco' => 8.50, 'imagem' => 'img/suco.jpg'],
            ['id' => 103, 'nome' => 'Água Mineral', 'descricao' => 'Garrafa 500ml com ou sem gás.', 'preco' => 4.00, 'imagem' => 'img/agua.jpg'],
            ['id' => 104, 'nome' => 'Milk Shake', 'descricao' => 'Sabores: Chocolate, Morango, Baunilha ou Ovomaltine.', 'preco' => 12.00, 'imagem' => 'img/milkshake.jpg'],
        ],
        'acompanhamentos' => [
            ['id' => 201, 'nome' => 'Batata Frita', 'descricao' => 'Porção média com molho especial.', 'preco' => 10.00, 'imagem' => 'img/batata.jpg'],
            ['id' => 202, 'nome' => 'Nuggets', 'descricao' => 'Porção com 6 unidades de frango empanado.', 'preco' => 9.00, 'imagem' => 'img/nuggets.jpg'],
        ]
    ];
}

function format_price($value) {
    return 'R$ ' . number_format($value, 2, ',', '.');
}
?>
