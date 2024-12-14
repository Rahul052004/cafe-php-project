let orderItems = JSON.parse(localStorage.getItem('orderItems')) || [];
let orderTotal = parseFloat(localStorage.getItem('orderTotal')) || 0; // Ensure orderTotal is treated as a number

function groupOrderItems(items) {
    const groupedItems = {};

    items.forEach(item => {
        if (groupedItems[item.item]) {
            groupedItems[item.item].quantity += 1;
            groupedItems[item.item].totalPrice += item.price;
        } else {
            groupedItems[item.item] = {
                item: item.item,
                image: item.image,
                price: item.price,  
                quantity: 1,
                totalPrice: item.price
            };
        }
    });

    return Object.values(groupedItems);
}

function displayOrder() {
    const orderItemsElem = document.getElementById('orderItems');
    const orderTotalElem = document.getElementById('orderTotal');
    const hiddenOrderItems = document.getElementById('hiddenOrderItems');
    const hiddenOrderTotal = document.getElementById('hiddenOrderTotal');

    orderItemsElem.innerHTML = '';

    const groupedItems = groupOrderItems(orderItems);

    let orderItemsForSubmission = [];

    groupedItems.forEach(orderItem => {
        const li = document.createElement('li');
        li.innerHTML = `
            <img src="${orderItem.image}" alt="${orderItem.item}">
            <span>${orderItem.item} - Rs.${orderItem.price} x ${orderItem.quantity} = Rs.${orderItem.totalPrice.toFixed(2)}</span>
        `;
        orderItemsElem.appendChild(li);

        orderItemsForSubmission.push({
            item: orderItem.item,
            price: orderItem.price,
            quantity: orderItem.quantity,
            totalPrice: orderItem.totalPrice
        });
    });

    hiddenOrderItems.value = JSON.stringify(orderItemsForSubmission);
    hiddenOrderTotal.value = orderTotal.toFixed(2);
    orderTotalElem.textContent = orderTotal.toFixed(2);
}

// Function to clear the cart after confirming the order
function clearCartOnSubmit(event) {
    localStorage.removeItem('cart'); // Remove the cart from localStorage
    localStorage.removeItem('orderItems'); // Remove orderItems
    localStorage.removeItem('orderTotal'); // Remove orderTotal
}

// Attach event listener to clear cart when form is submitted
document.getElementById('orderForm').addEventListener('submit', clearCartOnSubmit);

window.addEventListener('load', displayOrder);