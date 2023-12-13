<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mass V Group Inc. - Home</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <!--HEADER-->
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="/" class="nav__logo">
                    <img src="assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
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
                                <a href="#" class="dropdown__link">
                                    <i class="ri-user-line"></i> SAMIC Catalog
                                </a>
                            </li>

                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-lock-line"></i> SAMIC Product List
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
        <!--HERO CONTENT-->
        <div class="hero">
            <div class="content">
                <p id="company">MVG CIRCLE 1001 CORP.</p>
                <h1>Leading Importer and Distributor of <strong>Automotive Batteries, Oil, and Lubricants</strong> in the Philippines</h1>
                <p id="minor"><strong>Nationwide distribution network</strong> of more than 800 outlets/dealers</p>
                <a class="hero-btns" href="#section2" id="cta">Select Vehicle</a>
                <a class="hero-btns" href="/contact" id="contact-button">Contact Us</a>
            </div>
            <div class="image">
                <img src="assets/Mega Force Plus.png" alt="megaforce battery">
            </div>
        </div>
    </header>


    <!--SECTION 1-->
    <section class="section1">
        <h1>Featured Products</h1>
        <div class="fp-container">
            @foreach($products as $product)
            <div class="card">
                <img id="featured-image" src="{{ $product -> image }}" alt="">
                <div class="featured-details">
                    <h2>{{ $product -> name }}</h2>
                    <p>{{ $product -> description}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>


    <!--SECTION 2-->
    <section class="section2">
        <h1>Select Your Vehicle</h1>
        <div class="section-container">
            <form action="#" id="battery-form">
                <select name="manufacturer" id="manufacturer">
                    <option value="default">Choose Manufacturer</option>
                    <option value="Acura">Acura</option>
                    <option value="Alpha Romeo">Alpha Romeo</option>
                    <option value="Bentley">Bentley</option>
                    <option value="BMW">BMW</option>
                    <option value="BYD">BYD</option>
                    <option value="Cherry">Cherry</option>
                </select>
                <select name="model" id="model">
                    <option value="default">Choose Model</option>
                    <option value="Acura">Acura</option>
                    <option value="Alpha Romeo">Alpha Romeo</option>
                    <option value="Bentley">Bentley</option>
                    <option value="BMW">BMW</option>
                    <option value="BYD">BYD</option>
                    <option value="Cherry">Cherry</option>
                </select>
                <select name="year" id="year">
                    <option value="default">Choose Year</option>
                    <option value="Acura">Acura</option>
                    <option value="Alpha Romeo">Alpha Romeo</option>
                    <option value="Bentley">Bentley</option>
                    <option value="BMW">BMW</option>
                    <option value="BYD">BYD</option>
                    <option value="Cherry">Cherry</option>
                </select><br>
                <button type="button" onclick="submitAndChangeStyles()()">Submit</button>
            </form>
            <div class="battery" id="battery">
                <img src="assets/Mega Force Plus.png" alt="">
                <div class="battery-details">
                    <h2>MEGAFORCE</h2>
                    <ul>
                        <li><strong>MVGI Battery:</strong> DIN100</li>
                        <li><strong>New JIS Type:</strong> 60044</li>
                        <li><strong>Warranty:</strong> 18 MONTHS/6 MONTHS</li>
                    </ul>
                    <br>
                    <p>If the vehicle is equipped with start/stop technology, the recommended battery is AGM. If not, the recommended brand is MEGAFORCE.</p>
                </div>
            </div>
        </div>
    </section>

    <!--SECTION 3-->
    <section class="section3">
        <h1>About Us</h1>
        <div class="about-container">
            <div class="timeline">
                <div class="timeline-card">
                    <p>In <strong>1996</strong>, a group of battery retailers, who were competitors among themselves decided to put up a corporation to start importing and distributing automotive batteries, thus MASS V GROUP, INC. was born.</p>
                </div>
                <div class="timeline-card">
                    <p><strong>MASSIV</strong> (where Mass-V derived its name from) was the first brand of battery imported from P.T. Trimitra Baterai Prakasa, a leading battery manufacturer in Indonesia. Eventually, Mega Force, Primera and Superking were added to the product line. These low maintenance batteries adapted German technology and design which guaranteed better quality and long life.</p>
                </div>
                <div class="timeline-card">
                    <p><strong>2017</strong> - changed the business name to MVG Circle 1001 Corp. to handle the sales and services of oil and lubricants, as well as automotive batteries under the following brands:</p><br>
                    <ul>
                        <li>Mega Force</li>
                        <li>Primera</li>
                        <li>SuperKing</li>
                        <li>EXG - batteries and lubricants</li>
                        <li>SAMIC Lubricants - from the UAE</li>
                    </ul>
                </div>
            </div>
            <div class="mission-vision">
                <div class="mv-card">
                    <h2><strong>Mission</strong></h2>
                    <ul>
                        <li>Surpass our competitors in quality, value and innovation.</li>
                        <li>Not just to be the biggest but the best in terms of consumer value, customer service, employee talent, and consistent growth.</li>
                        <li>Be the BEST IN THE EYES of our customers, employees and directors.</li>
                        <li>Keep the tradition of preserving, protecting and strengthening the ties between the directors.</li>
                    </ul>
                </div>
                <div class="mv-card">
                    <h2><strong>Vision</strong></h2>
                    <p>Envisions itself to be the PREMIER and MOST TRUSTED battery and lube distributor in the Philippines, with a COMPETITIVE, INNOVATIVE and DYNAMIC product portfolio that responds to the needs of the market.</p>
                    <p>Led by the 10 Directors – unified in the aims and traditions of continuously driving MVG into a more brilliant future.</p>
                </div>
            </div>
        </div>
    </section>

    <!--FOOTER-->
    <footer>

    </footer>

    <script src="main.js"></script>
    <script>
        function submitAndChangeStyles() {
            const battery = document.getElementById('battery');
            const form = document.getElementById('battery-form');
            if (battery) {
                battery.classList.add('animate');
                form.classList.add('animate');
            }
        }
    </script>
</body>

</html>