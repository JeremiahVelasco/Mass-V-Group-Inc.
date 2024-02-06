<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin.css">
    <link rel="icon" href="/assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MVG Admin</title>
</head>

<body>

    @if (!session('adminsuccess'))
        <script>
            window.location.href = "/admin";
        </script>
    @endif
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img class="logo" src="/assets/MVG Circle 1001 Logo PNG 2 - RGB.png" alt="">
            <span class="text">MVG Admin</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="/admin/dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="/admin/featured">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Featured Products</span>
                </a>
            </li>
            <li>
                <a href="/admin/products">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Products</span>
                </a>
            </li>
            <li>
                <a href="/admin/events">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Events</span>
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
                    <img class="fp_image" src="/assets/placeholder.png" id="image-content-1" alt="">
                    <span class="text">
                        <form action="">
                            <h3 id="header-1">Product 1</h3>
                            <select name="feature" id="feature-1">
                                <option value="default">Choose from Products</option>
                                @foreach ($batteries as $battery)
                                    <option value="{{ $battery->id }}">{{ $battery->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="saveBattery(1)">Save</button>
                        </form>
                    </span>
                </li>
                <li>
                    <img class="fp_image" src="/assets/placeholder.png" id="image-content-2" alt="">
                    <span class="text">
                        <form action="">
                            <h3 id="header-2">Product 2</h3>
                            <select name="feature" id="feature-2">
                                <option value="default">Default</option>
                                @foreach ($batteries as $battery)
                                    <option value="{{ $battery->id }}">{{ $battery->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="saveBattery(2)">Save</button>
                        </form>
                    </span>
                </li>
                <li>
                    <img class="fp_image" src="/assets/placeholder.png" id="image-content-3" alt="">
                    <span class="text">
                        <form action="">
                            <h3 id="header-3">Product 3</h3>
                            <select name="feature" id="feature-3">
                                <option value="default">Default</option>
                                @foreach ($batteries as $battery)
                                    <option value="{{ $battery->id }}">{{ $battery->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="saveBattery(3)">Save</button>
                        </form>
                    </span>
                </li>
                <li>
                    <img class="fp_image" src="/assets/placeholder.png" id="image-content-4" alt="">
                    <span class="text">
                        <form action="">
                            <h3 id="header-4">Product 4</h3>
                            <select name="feature" id="feature-4">
                                <option value="default">Default</option>
                                @foreach ($batteries as $battery)
                                    <option value="{{ $battery->id }}">{{ $battery->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="saveBattery(4)">Save</button>
                        </form>
                    </span>
                </li>
            </ul>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="/script.js"></script>
    <script>
        const product1 = document.getElementById('feature-one');
        const product2 = document.getElementById('feature-two');
        //const product3 = document.getElementById('feature-three');
        function renderSavedProducts() {
            $.ajax({
                type: 'GET',
                url: "/getSavedProducts",
                success: function(response) {
                    if (response.success) {
                        //reset all states
                        let results = response.data;
                        results.forEach(result => {
                            const num = result.saved_slot;
                            let imageContentSelector = "#image-content-" + num;
                            let headerSelector = "#header-" + num;
                            let featureSelector = "#feature-" + num;
                            $(imageContentSelector).attr("src", "/" + result.image);
                            $(headerSelector).text(result.name);
                            $(featureSelector).val(result.id);
                        });
                    } else {
                        console.log('No existing products');
                    }
                },
                error: function(error) {
                    console.error('Error fetching saved battery', error);
                }
            })
        }

        function saveBattery(num) {
            let batteryIdSelector = "#feature-" + num;
            let selectedBatteryId = $(batteryIdSelector).val();
            let csrfHeader = $('meta[name="csrf-token"]').attr('content');
            if (selectedBatteryId !== 'default') {
                //update save_slot of given battery id
                $.ajax({
                    type: "POST",
                    url: `/saveBattery/${selectedBatteryId}/${num}`,
                    headers: {
                        'X-CSRF-TOKEN': csrfHeader
                    },
                    success: function(response) {
                        // Update the details on the page
                        if (response.success) {
                            console.log(response.message);
                            let count = 1;
                            let all_h3 = document.querySelectorAll('h3');
                            all_h3.forEach(h3 => {
                                h3.textContent = 'Product' + count;
                                count++;
                            })
                            $(".fp_image").attr('src', '/assets/placeholder.png');
                            $(".feature").val('default');
                            renderSavedProducts();
                        }
                    },
                    error: function(error) {
                        console.log("Error saving battery details", error);
                    }
                });
            } else {
                alert("Please select a battery");
            }
        }
        renderSavedProducts();
    </script>
</body>

</html>
