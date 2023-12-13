<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin.css">
    <link rel="icon" href="assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                        <h3>{{ $battery_count }}</h3>
                        <p>Total Products</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>Coming Soon...</h3>
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
                                <th>MVGI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batteries as $battery)
                            <tr>
                                <td>
                                    <img src="{{ $battery->image}}">
                                    <p>{{ $battery->name}}</p>
                                </td>
                                <td><span class="status completed">{{ $battery->mvgi}}</span></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Featured Products</h3>
                    </div>
                    <ul class="todo-list">
                        @foreach($featured_batteries as $battery)
                        <li class="completed">
                            <p>{{$battery->name}}</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        @endforeach
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