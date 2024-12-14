<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Delivery</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <header>
        <h1>Menu Card</h1>
        
    </header>

    <main>
        <section id="menu">
            <div class="food-item">
                <img src="image/pizza.jpg" alt="Pizza">
                <h3>Pizza</h3>
                <p>Rs.150.00</p>
                <button id="addFood" onclick="addToCart('Pizza',150,'image/pizza.jpg')">Add to cart</button>
            </div>
            <div class="food-item">
                <img src="image/burger.jpg" alt="Burger">
                <h3>Burger</h3>
                <p>Rs.150.00</p>
                <button id="addFood" onclick="addToCart('Burger',150,'image/burger.jpg')">Add to cart</button>
            </div>
            <div class="food-item">
                <img src="image/pasta.jpg" alt="Pasta">
                <h3>Pasta</h3>
                <p>Rs.200.00</p>
                <button id="addFood" onclick="addToCart('Pasta',200,'image/pasta.jpg')">Add to cart</button>
            </div>
            <div class="food-item">
                <img src="image/sandwich.jpg" alt="Pasta">
                <h3>Sandwich</h3>
                <p>Rs.60.00</p>
                <button id="addFood" onclick="addToCart('Sandwich',60,'image/sandwich.jpg')">Add to cart</button>
            </div>
            <div class="food-item">
                <img src="image/rice.jpg" alt="Pasta">
                <h3>Rice</h3>
                <p>Rs.200.00</p>
                <button id="addFood" onclick="addToCart('Rice',200,'image/rice.jpg')">Add to cart</button>
            </div>
            <div class="food-item">
                <img src="image/chicken.jpg" alt="Pasta">
                <h3>Chicken Curry</h3>
                <p>Rs.180.00</p>
                <button id="addFood" onclick="addToCart('Chicken Curry',180,'image/chicken.jpg')">Add to cart</button>
            </div>
            <div class="food-item">
                <img src="image/tandoori.jpg" alt="Pasta">
                <h3>Kebab</h3>
                <p>Rs.250.00</p>
                <button id="addFood" onclick="addToCart('Kabab',250,'image/tandoori.jpg')">Add to cart</button>
            </div>
            <div class="food-item">
                <img src="image/icecream.jpg" alt="Pasta">
                <h3>Ice Cream</h3>
                <p>Rs.80.00</p>
                <button id="addFood" onclick="addToCart('Ice Cream',80,'image/icecream.jpg')">Add to cart</button>
            </div>
            <div class="food-item">
                <img src="image/pastry.jpg" alt="Pasta">
                <h3>Pastry</h3>
                <p>Rs.70.00</p>
                <button id="addFood" onclick="addToCart('Pastry',70,'image/pastry.jpg')">Add to cart</button>
            </div>
            
        </section>
          </div>
        <a class="view-cart" href="cart.php">View Cart</a>
    </div>

    </main>

    <script src = "menu.js"></script>
    
</body>
</html>
