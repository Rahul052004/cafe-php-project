<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KolkataCafe.com</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Amita&family=Roboto:wght@100&family=Victor+Mono:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <nav id="navbar">
        <div id="logo">
            <img src="image/rahul.jpg" alt="KolkataCafe.com">
        </div>
    <ul>
        <li class="item"><a href="#home">Home</a></li>
        <li class="item"><a href="#serve">Services</a></li>
        <li class="item"><a href="#client-section">Our Clients</a></li>
        <li class="item"><a href="#contact">Contact Us</a></li>   
    </ul>
    <?php if(isset($_SESSION["user"]) && $_SESSION["user"] == true): ?>
        <button class="log" id="logout"><a href="logout.php">Logout</a></button>
    <?php else: ?>
        <button class="log" id="login"><a href="login.php">Login</a></button>
    <?php endif; ?>
    
    <button class="cart" ><a href="cart.php" ><img src="image/cart2.png" alt="Our Client"></a></button>

    </nav>

    <section id="home">
        <h1 class="h-primary">Welcome to Kolkata Cafe</h1>
        <p><b>Welcome to our Kolkata Cafe, where every cup of coffee is brewed to perfection and each dish is crafted with love. Relax, unwind, and savor the simple pleasures in life at our warm and inviting space </b></p>
        
        <button class="btn" id="myButton" >Order Now</button>
    </section>

    <section class="services-container" id="serve">
        <h1 class="h-primary center">Our Services</h1>
        <div id="services">
            <div class="box">
                <img src="image/delivery.jpg" alt="">
                <h2 class="h-secondary center">Home Delivery</h2>
                <p class="center">Enjoy the convenience of ordering your favorite dishes from our restaurant. Our user-friendly online system ensures quick, hassle-free ordering with fast delivery. Fresh, flavorful meals are just a click away, delivered straight to your door.</p>
            </div>
            <div class="box">
                <img src="image/catering.jpg" alt="">
                <h2 class="h-secondary center">Caterer Service</h2>
                <p class="center">Elevate your events with our premium catering services. We offer a diverse menu tailored to your needs, from intimate gatherings to grand celebrations. Enjoy exceptional food and attentive service that will leave a lasting impression on your guests.</p>
    
        </div>
            <div class="box">
                <img src="image/noodles.jpg" alt="">
                <h2 class="h-secondary center">Wish Dish Counter</h2>
                <p class="center"> Have a special dish in mind? Our Wish Dish service allows you to submit your culinary desires, and our chefs will craft a personalized meal just for you. Experience custom creations and indulge in a unique dining experience tailored to your taste.</p>
    
        </div>
    </section>
    <section id="client-section">
        <h1 class="h-primary center">Our Clients </h1>
        <div id="clients">
            <div class="client-item">
                <img src="image/Zomato_logo.png" alt="Our Client">
            </div>
             <div class="client-item">
                <img src="image/Zomato_logo.png" alt="Our client">
            </div> 
            
            
        </div>
    </section>
    
    <section id="contact">
        <h1 class="h-primary center">Contact Us</h1>
            <div id="contact-box">
                <form action="">
                    <div class="form-group">
                        <label for="name">Name:</label>
                         <input type="text" name="name" id="name"
                         placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="Phone No">Phone No:</label>
                         <input type="phone" name="name" id="name"
                         placeholder="Enter your Phone no.">
                    </div>
                    <div class="form-group">
                        <label for="name">Feedback:</label>
                         <textarea name="Feedback" id="Feedback" cols="30" rows="10"></textarea>
                    </div>
                </form>

             </div>
    
    </section>


    <footer>
        <div class="center">
            Copyright &copy; www.KolkataCafe.com.  All rights reserved
        </div>
    </footer>

    <script>
             document.getElementById('myButton').addEventListener('click', function() {
            window.location.href = 'menu.php';
        });
    </script>

</body>
</html>