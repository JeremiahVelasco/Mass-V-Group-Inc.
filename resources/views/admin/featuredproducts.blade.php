<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin.css">
    <link rel="icon" href="assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <li>
                <a href="/admindashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
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
                    <h1>Featured Products</h1>
                </div>
            </div>

            <ul class="box-info">
                <li>
                    <img class="fp_image" src="assets/placeholder.png" alt="">
                    <span class="text">
                        <form action="">
                            <h3>Product 1</h3>
                            <select name="feature" id="feature-one">
                                <option value="default">Choose from Products</option>
                                @foreach($batteries as $battery)
                                <option value="{{ $battery->id }}">{{ $battery->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="saveBattery(this)">Save</button>
                        </form>
                    </span>
                </li>
                <li>
                    <img class="fp_image" src="assets/placeholder.png" alt="">
                    <span class="text">
                        <form action="">
                            <h3>Product 2</h3>
                            <select name="feature" id="feature-two">
                                <option value="default">Choose from Products</option>
                                @foreach($batteries as $battery)
                                <option value="{{ $battery->id }}">{{ $battery->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="saveBattery(this)">Save</button>
                        </form>
                    </span>
                </li>
                <li>
                    <img class="fp_image" src="assets/placeholder.png" alt="">
                    <span class="text">
                        <form action="">
                            <h3>Product 3</h3>
                            <select name="feature" id="feature-three">
                                <option value="default">Choose from Products</option>
                                @foreach($batteries as $battery)
                                <option value="{{ $battery->id }}">{{ $battery->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="saveBattery(this)">Save</button>
                        </form>
                    </span>
                </li>
            </ul>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
    <script>
        const product1 = document.getElementById('feature-one');
        const product2 = document.getElementById('feature-two');
        //const product3 = document.getElementById('feature-three');

        function saveBattery() {
            var selectedBatteryId = $("#feature-three").val();

            if (selectedBatteryId !== 'default') {
                $.ajax({
                    type: "GET",
                    url: "/getBatteryDetails/" + selectedBatteryId,
                    success: function(response) {
                        // Update the details on the page
                        $(".fp_image").attr("src", response.image); // Assuming there's an 'image' field in the response
                        $("h3").text(response.name); // Update other details accordingly
                    },
                    error: function(error) {
                        console.log("Error fetching battery details");
                    }
                });
            } else {
                console.log("Please select a battery");
            }
        }
    </script>
</body>

</html>