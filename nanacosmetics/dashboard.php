<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Loja de Cosméticos</title>
</head>
<body>
    <header>
        Bem-vinda à Nana Cosmetics
    </header>

    <div class="produtos">
        <div class="produto">
            <img src="https://i.pinimg.com/736x/3d/2b/b5/3d2bb57af64d0cf8ecde0bfefa81beab.jpg" alt="Batom">
            <h3>Batom</h3>
            <p>R$ 15,00</p>
            <button class="botao-comprar">Comprar</button>
        </div>

        <div class="produto">
            <img src="https://i.pinimg.com/736x/e2/78/a3/e278a336cf07c12237d1e18439b2638d.jpg" alt="Perfume">
            <h3>Perfume</h3>
            <p>R$ 45,00</p>
            <button class="botao-comprar">Comprar</button>
        </div>

        <div class="produto">
            <img src="https://i.pinimg.com/736x/36/8a/b3/368ab35aee1bf50c886a4fd547b82cc1.jpg" alt="Creme">
            <h3>Creme de Mãos</h3>
            <p>R$ 20,00</p>
            <button class="botao-comprar">Comprar</button>
        </div>

        <div class="produto">
            <img src= "https://i.pinimg.com/736x/28/1c/bf/281cbf8dd8da7b2d6b2d0209eda8f2f5.jpg" alt="Esmalte">
            <h3>Esmalte</h3>
            <p>R$ 10,00</p>
            <button class="botao-comprar">Comprar</button>
        </div>

    </div>
    <div id="carrinho" style="margin-top: 40px; background-color: #fff0f6; padding: 20px; border-radius: 12px; width: 80%; max-width: 600px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <h2>Seu Carrinho:</h2>
    <ul id="lista-carrinho" style="list-style: none; padding: 0;"></ul>
    <p id="total-carrinho" style="font-weight: bold; color: #e91e63;">Total: R$ 0,00</p>
</div>

<script>
  const botoes = document.querySelectorAll('.botao-comprar');
  const listaCarrinho = document.getElementById('lista-carrinho');
  const totalCarrinho = document.getElementById('total-carrinho');

  let carrinho = [];
  let total = 0;

  botoes.forEach(botao => {
    botao.addEventListener('click', function() {
      const produtoCard = this.parentElement;
      const nome = produtoCard.querySelector('h3').innerText;
      const precoTexto = produtoCard.querySelector('p').innerText;
      
      const preco = parseFloat(precoTexto.replace('R$ ', '').replace(',', '.'));

      carrinho.push({ nome, preco });

      total += preco;

      atualizarCarrinho();
    });
  });

  function atualizarCarrinho() {
    listaCarrinho.innerHTML = '';

    carrinho.forEach(item => {
      const li = document.createElement('li');
      li.innerText = `${item.nome} - R$ ${item.preco.toFixed(2).replace('.', ',')}`;
      listaCarrinho.appendChild(li);
    });

    totalCarrinho.innerText = `Total: R$ ${total.toFixed(2).replace('.', ',')}`;
  }

  
</script>


</body>
</html>