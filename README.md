# Mr-Burger
Bem vindo ao Mr.Burger! Aqui procuramos atender você da melhor forma possível, expondo nossos deliciosos hamburgueres e acompanhamentos, junto com refrescantes bebidas!
Sinta-se a vontade e navegue por nossas páginas para melhor escolher o seu pedido!

# Estrutura do código

O cardápio conta com uma página inicial, cuja programação está contida no arquivo [index](./index.php). Nesta página, consta uma mensagem de boas vindas e links de redirecionamento para as diferentes categorias do cardápio.

Escolhida a categoria desejada, o usuário será redirecionado para a mesma. Nesta categoria, estarão listados os itens descritos no arquivo [dados](./dados.php) com a formatação dada no arquivo [cardápio](./cardapio.php). 
Cada item possui nome, foto, preço e descrição. Ao clicar em um item, abrirá uma página com a opção de adicionar ao carrinho, visto no arquivo [item](./item.php).

Ao adicionar um item ao carrinho, o usuário deve selecionar a quantidade desejada. Concluindo o procedimento, as informações do pedido serão adicionadas ao carrinho, que pode receber outros pedidos.
Acessando o carrinho, o usuário encontrará todos os pedidos adicionados ao mesmo, como descrito no arquivo [carrinho](./carrinho.php). Nesta página, encontram-se as informações de cada pedido e o valor total.

Para melhorar a experiencia do usuário, todas as páginas possuem cabeçalho com menu e um rodapé, contidos nos arquivos [header](./header.php) e [footer](./footer.php), respectivamente. 
No header, o usuário pode navegar pelas páginas do site e no rodapé contem informações sobre o Mr.Burger.

# Imagens

As imagens, sendo meramente ilustrativas, foram retiradas do banco de imagens gratuito [unsplash](https://unsplash.com/pt-br). Todas as imagens devem permanecer na pasta [img](./img) para que o programa execute corretamente.

# Créditos
Este se trata de um projeto de um cardápio online para o restaurante fictício Mr. Burger. Este projeto é parte do curso de Análise e Desenvolvimento de Sistemas, disciplina Programação Web.
Foi requisitado o uso de linguagem php ou java, não sendo permitidas qualquer outra liguagem de programação. Também foi restringido o uso de API's REST e de frameworks php ou java.

Este projeto foi realizado pelos alunos Artur Mota Gomes e Henrique Medeiros de Araújo. 

Orientados pelo estimado professor Jeofton Costa Melo.
