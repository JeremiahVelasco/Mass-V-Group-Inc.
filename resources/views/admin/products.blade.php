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
            <li>
                <a href="/adminfeaturedproducts">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Featured Products</span>
                </a>
            </li>
            <li class="active">
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
                    <h1>Products</h1>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Current Products</h3>
                        <i id="add-button" class='bx bx-plus'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>MVGI</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batteries as $battery)
                            <tr>
                                <td>
                                    <img src="{{ $battery->image }}">
                                    <p>{{ $battery->name}}</p>
                                </td>
                                <td><span class="status completed">{{ $battery->mvgi}}</span></td>
                                <td><a href="#" data-name="{{ $battery['name'] }}" class="delete"><i class="fa-solid fa-trash-can"></i> Delete </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal hidden">
                <h1>Add Product</h1>
                <form action="" id="add-product-form" class="add-product-form">
                    @csrf
                    <label for="image">Image</label>
                    <input type="file" id="image">
                    <label for="name">Name</label>
                    <input type="text" id="name">
                    <label for="mvgi">MVGI</label>
                    <input type="text" id="mvgi">
                    <label for="jis_type">JIS Type</label>
                    <input type="text" id="jis_type">
                    <label for="warranty">Warranty</label>
                    <input type="text" id="warranty">
                    <label for="description">Description</label>
                    <input type="text" id="description">
                    <button type="submit" id="submit-button">Submit</button>
                    <button id="cancel">Cancel</button>
                </form>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
    <script>
        const add = document.getElementById('add-button');
        const modal = document.querySelector('.modal');
        const cancel = document.getElementById('cancel');

        add.addEventListener('click', function() {
            modal.classList.toggle('active');
        });

        cancel.addEventListener('click', function() {
            modal.classList.toggle('hidden');
        });

        $(document).ready(function() {
            $("#add-product-form").submit(function(event) {
                event.preventDefault();

                var formData = {
                    image: $("#image").val(),
                    name: $("#name").val(),
                    mvgi: $("#mvgi").val(),
                    jis_type: $("#jis_type").val(),
                    warranty: $("#warranty").val(),
                    description: $("#description").val(),
                    _token: $('meta[name="csrf-token"]').attr('content'),
                };
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                console.log(csrfToken);

                $.ajax({
                    type: "POST",
                    url: "/addProduct",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        Swal.fire("Success!", "Patient added successfully.", "success");

                        $("#add-product-form")[0].reset();

                    },
                    error: function(error) {
                        console.log("Did not work")

                    },
                });
            });
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('delete')) {
                e.preventDefault();
                const name = e.target.getAttribute('data-name');

                // Send an AJAX request to the getRecords function in the controller
                $.ajax({
                    type: 'POST',
                    url: '/deleteProduct',
                    data: {
                        name: name,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Successfuly Deleted',
                                showConfirmButton: true,
                                confirmButtonColor: '#F27574',
                                timer: 2500
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Reload the page
                                    location.reload();
                                }
                            });
                        } else {
                            console.log("Failed to Delete")
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                    }
                });

            }
        });
    </script>
</body>

</html>