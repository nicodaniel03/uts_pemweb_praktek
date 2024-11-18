<?php
include 'function.php'; 

if (!isset($_SESSION['role'])) {
    header("Location: login.php"); 
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Pemesanan Makanan</title>
    <link rel="stylesheet" href="css/memesan.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

<header class="main-header">
    <h1 class="site-title">Pesan Makanan Online</h1>
    <input type="text" id="search-input" name="search" placeholder="Cari Jenis Makanan atau Minuman">
        <button type="submit" class="pencarian"><i data-feather="search"></i></button>
    <div class="menu">
            <div class="hamburger" id="hamburger-menu">&#9776;</div>
            <div class="dropdown-content" id="dropdown-content">
                <a href="historypesan.php">History Pemesanan</a>
                <a href="logout.php" class="logout">Logout</a>
            </div>
    </div>
</header>

<script>
        const hamburgerMenu = document.getElementById('hamburger-menu');
        const dropdownContent = document.getElementById('dropdown-content');
        const body = document.body;

        hamburgerMenu.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdownContent.classList.toggle('show');
        });

        body.addEventListener('click', function() {
            dropdownContent.classList.remove('show');
        });
 
</script>

<section class="description">
    <h2>Selamat datang di halaman pemesanan!</h2>
</section>

<section class="order-table">
    <!-- Item makanan -->
    <div class="order-item" data-category="Minuman">
        <img src="https://img.qraved.co/v2/image/data/main-photo-1565077754285-x.png" alt="dessert" class="food-image">
        <h3>Es Teh</h3>
        <p class="price">Harga 6.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count1">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>

    <div class="order-item" data-category="Makanan">
        <img src="https://cdn1-production-images-kly.akamaized.net/hffw81JwX7tcI2GO3rFQA7yiSCc=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/1050094/original/057797700_1447149490-10112015-nasilemak.jpg" alt="Makanan 2" class="food-image">
        <h3>Bebek</h3>
        <p class="price">Harga 20.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count2">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
    <div class="order-item" data-category="Makanan">
        <img src="https://parboaboa.com/data/foto_berita/resep_smoothie_bowl_u.webp" alt="Makanan 3" class="food-image">
        <h3>Sate</h3>
        <p class="price">Harga 20.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count3">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
    <div class="order-item" data-category="Makanan">
        <img src="https://th.bing.com/th/id/OIP.Ynmibhc0SlCs8KWVDTVw7wHaFL?rs=1&pid=ImgDetMain" alt="Makanan 4" class="food-image">
        <h3>Ayam</h3>
        <p class="price">Harga 20.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count4">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
    <div class="order-item" data-category="makanan">
        <img src="https://media-cdn.tripadvisor.com/media/photo-s/12/f8/96/2c/margherita-pizza.jpg" alt="Makanan 5" class="food-image">
        <h3>Nasi Padang</h3>
        <p class="price">Harga 20.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count5">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
    <div class="order-item" data-category="Minuman">
        <img src="https://th.bing.com/th/id/OIP.L4Nn9goLuiOb5ny1QlqtqAHaHa?rs=1&pid=ImgDetMain" alt="Minuman 6" class="food-image">
        <h3>Jus</h3>
        <p class="price">Harga 10.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count6">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
    <div class="order-item" data-category="makanan">
        <img src="https://th.bing.com/th/id/OIP.gYeD_8nX8CxaMEbzUGvtRgHaHa?rs=1&pid=ImgDetMain" alt="Makanan 7" class="food-image">
        <h3>Makanan 7</h3>
        <p class="price">Harga 20.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count7">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
    <div class="order-item" data-category="makanan">
        <img src="https://th.bing.com/th/id/R.ce5df3d333c0a1dea287eb192fa7c21d?rik=6ZDwfMPiu1Sl2Q&riu=http%3a%2f%2f1.bp.blogspot.com%2f-rFgRwcB-qJw%2fUtNNEkWIzPI%2fAAAAAAAABdg%2fE09Hu9KOpmU%2fs1600%2fAyam%2bBakar.jpg&ehk=hTY1oD6OEadCHThcw0GQhnNw%2fBwrBP0imOBZomld7%2bg%3d&risl=&pid=ImgRaw&r=0" alt="Makanan 8" class="food-image">
        <h3>Makanan 8</h3>
        <p class="price">Harga 20.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count8">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
    <div class="order-item" data-category="makanan">
        <img src="https://th.bing.com/th/id/OIP.EGbTsYjG-uxqFXSvoCvdQwHaE8?rs=1&pid=ImgDetMain" alt="Makanan 9" class="food-image">
        <h3>Makanan 9</h3>
        <p class="price">Harga 20.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count9">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
    <div class="order-item" data-category="makanan">
        <img src="https://hariliburnasional.com/wp-content/uploads/2020/07/masakan-nusantara.jpg" alt="Makanan 10" class="food-image">
        <h3>Makanan 10</h3>
        <p class="price">Harga 20.000</p>
        <div class="quantity">
            <button class="btn minus">-</button>
            <span class="count" id="#count10">0</span>
            <button class="btn plus">+</button>
        </div>
    </div>
   
</section>

<footer class="fixed-footer">
    <a href="pembayaran.php">
        <button class="order-button">Buat Pesanan</button>
    </a>
</footer>

<script>
    
    feather.replace();

    const orders = JSON.parse(localStorage.getItem('orders')) || {};

    document.querySelectorAll('.order-item').forEach(function(item) {
        const plusButton = item.querySelector('.plus');
        const minusButton = item.querySelector('.minus');
        const countElement = item.querySelector('.count');
        let itemCount = 0;

        const itemName = item.querySelector('h3').innerText; 
        const itemPrice = parseInt(item.querySelector('.price').innerText.replace('Harga ', '').replace('.', '').replace(',', ''));

        plusButton.addEventListener('click', function() {
            itemCount++;
            countElement.textContent = itemCount;
            saveOrder(itemName, itemPrice, itemCount);
        });

        minusButton.addEventListener('click', function() {
            if (itemCount > 0) {
                itemCount--;
                countElement.textContent = itemCount;
                saveOrder(itemName, itemPrice, itemCount);
            }
        });

        function saveOrder(itemName, price, quantity) {
            let orders = JSON.parse(localStorage.getItem('orders')) || {}; 
            if (quantity > 0) {
                orders[itemName] = { kategori: item.dataset.category, harga: price, jumlah: quantity };
            } else {
                delete orders[itemName]; 
            }
            localStorage.setItem('orders', JSON.stringify(orders));  
        }
    });

    document.getElementById('search-input').addEventListener('input', function() {
        const searchQuery = this.value.toLowerCase();

        document.querySelectorAll('.order-item').forEach(function(item) {
            const category = item.getAttribute('data-category').toLowerCase();
            const itemName = item.querySelector('h3').innerText.toLowerCase();
            const itemPriceText = item.querySelector('.price').innerText.replace('Harga ', '').trim();
            const itemPrice = parseInt(itemPriceText.replace('.', '').replace(',', ''));

            if (searchQuery === "" || 
                category.includes(searchQuery) || 
                itemName.includes(searchQuery) || 
                itemPriceText.includes(searchQuery) || itemPrice === parseInt(searchQuery)) {
                item.style.display = 'flex'; 
            } else {
                item.style.display = 'none'; 
            }
        });
    });
</script>

</body>
</html>
