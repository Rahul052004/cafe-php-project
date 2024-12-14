
let cart = JSON.parse(localStorage.getItem('cart')) || [];

function removeFromCart(index) {
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart(); // Recalculate total amount when cart is displayed
}

function displayCart() {
    const cartItems = document.getElementById('cartItems');
    const totalAmountElem = document.getElementById('totalAmount');

    cartItems.innerHTML = '';
    let totalAmount = 0; // Reset totalAmount to 0 before iterating

    if (cart.length === 0) {
        cartItems.innerHTML = '<p style ="text-align : center">Your cart is empty!</p>';
        totalAmountElem.textContent = '0.00';
        return;
    }

    cart.forEach((cartItem, index) => {
        const li = document.createElement('li');
        li.innerHTML = `
            <img src="${cartItem.image}" alt="${cartItem.item}">
            <span>${cartItem.item} - Rs.${cartItem.price}</span>
            <button class="remove" onclick="removeFromCart(${index})">Remove</button>
        `;
        cartItems.appendChild(li);
        totalAmount += cartItem.price;
    });

    totalAmountElem.textContent = totalAmount.toFixed(2);
}

// Function to handle order placement
function placeOrder() {
    if (cart.length === 0) {
        alert("Your cart is empty! Please add items to the cart before placing an order.");
        return; // Prevent further execution
    }
    const totalAmount = document.getElementById('totalAmount').textContent;
    // Store order details in localStorage
    localStorage.setItem('orderItems', JSON.stringify(cart));
    localStorage.setItem('orderTotal', totalAmount);
    
    // Redirect to order page
    window.location.href = 'odd.php';
}

// Ensure displayCart is called on window load correctly
window.addEventListener('load', displayCart);

// Add event listener for order now button
document.getElementById('orderNow').addEventListener('click', placeOrder);