<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin.css">
    <link rel="icon" href="assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>MVG Admin</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img class="logo" src="assets/MVG Circle 1001 Logo PNG 2 - RGB.png" alt="">
            <span class="text">MVG Admin</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="/admindashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/adminfeaturedproducts">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Featured Products</span>
                </a>
            </li>
            <li>
                <a href="/adminproducts">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Products</span>
                </a>
            </li>
            <li>
                <a href="/adminpromos">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Promos</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="/logout" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="profile">
                <img src="assets/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>

                </div>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>6</h3>
                        <p>Total Products</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>3</h3>
                        <p>Current Promos</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Current Products</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="assets/New Primera LM - Front.png">
                                    <p>Primera LM</p>
                                </td>
                                <td><span class="status completed">Battery</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/samic-700x350 (1).png">
                                    <p>Samic Engine Oil</p>
                                </td>
                                <td><span class="status pending">Oil</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/New Super King LM - Front.png">
                                    <p>Super King LM</p>
                                </td>
                                <td><span class="status process">Battery</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/samic-700x350 (1).png">
                                    <p>Samic Lubricant</p>
                                </td>
                                <td><span class="status pending">Lubricant</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/New Mega Force LM - Front.png">
                                    <p>MegaForce LM</p>
                                </td>
                                <td><span class="status completed">Battery</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/Mega Force Plus.png">
                                    <p>MegaForce Plus</p>
                                </td>
                                <td><span class="status completed">Battery</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Featured Products</h3>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>SuperKing LM</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Primera LM</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Megaforce LM</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>