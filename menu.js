let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(item, price, image) {
cart.push({ item, price, image });
localStorage.setItem('cart', JSON.stringify(cart));
alert(item + " added to cart!");
}