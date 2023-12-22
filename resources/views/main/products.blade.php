<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mass V Group Inc. - Products</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" href="assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="/" class="nav__logo">
                    <img src="assets/MVG Circle 1001 Logo PNG 2 - RGB.png" alt="Mass V Group Inc. Logo">
                    <h1>Mass V Group Inc.</h1>
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__burger"></i>
                    <i class="ri-close-line nav__close"></i>
                </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li><a href="/" class="nav__link">Home</a></li>
                    <li><a href="/products" class="nav__link">Batteries</a></li>
                    <li class="dropdown__item">
                        <div class="nav__link">
                            <a href="/lubricants">Lubricants</a>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="/lubricants#samic-catalog" class="dropdown__link">
                                    <i class="ri-store-3-line"></i> SAMIC Catalog
                                </a>
                            </li>

                            <li>
                                <a href="/lubricants#samic-product-list" class="dropdown__link">
                                    <i class="ri-pages-line"></i> SAMIC Product List
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="/contact" class="nav__link">Contact Us</a></li>
                    <li><a href="https://www.facebook.com/massvgroup/" class="nav__link"><img src="assets/fb.png"></a></li>
                    <li><a href="https://samiclubricants.com/" class="nav__link"><img src="assets/Samic- Logo- Blue (Edited 3).png"></a></li>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <section class="products">
        <h1>Batteries</h1>
        <div class="product-container">
            <div class="product-card">
                <img src="assets/megaforce.webp" alt="megaforce batteries">
                <h2>MEGA FORCE</h2>
                <ul class="main-details">
                    <li>High Performance Battery</li>
                    <li>Maintenance-Free Variants</li>
                    <li>Low-Maintenance Variants</li>
                </ul>
                <br>
                <ul class="misc">
                    <li>More Plates + Polyethylene Envelope Separators</li>
                    <li>For Performance and Worry-Free Application</li>
                    <li>Extended Life | 18 Months Warranty</li>
                </ul>
                <button>Inquire</button>
            </div>

            <div class="product-card">
                <img src="assets/New Primera LM - Front.png" alt="primera batteries">
                <h2>PRIMERA</h2>
                <ul class="main-details">
                    <li>Re-engineered Elements</li>
                    <li>Low-Maintenance</li>
                </ul>
                <br>
                <ul class="misc">
                    <li>Perfect Balance Between Cost and Quality</li>
                    <li>General Purpose and Wide Product Application</li>
                    <li>12 Months Warranty</li>
                </ul>
                <button>Inquire</button>
            </div>

            <div class="product-card">
                <img src="assets/Sking.png" alt="superking batteries">
                <h2>SUPERKING</h2>
                <ul class="main-details">
                    <li>Hybrid Reinforced | Ideal for Tropical Climate</li>
                    <li>Low-Maintenance</li>
                </ul>
                <br>
                <ul class="misc">
                    <li>Tactical Brand with Hybrid-Reinforced Plates</li>
                    <li> Economical Option for Commercial and Industrial Applications</li>
                    <li>6 Months Warranty</li>
                </ul>
                <button>Inquire</button>
            </div>
        </div>
    </section>
    <script src="main.js"></script>
</body>

</html>