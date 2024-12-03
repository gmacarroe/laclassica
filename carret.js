
// Funcionalitat del carret de compra
let cart = [];

function addToCart(product) {
  cart.push(product);
  alert(`Producte afegit: ${product}`);
  console.log(cart);
}

function filterProducts(category) {
  const products = document.querySelectorAll('.producte');
  products.forEach(product => {
    if (category === 'all' || product.dataset.category === category) {
      product.style.display = 'block';
    } else {
      product.style.display = 'none';
    }
  });
}
