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

    @if(!session('adminsuccess'))
        <script>
            window.location.href="/admin";
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
            <li>
                <a href="/admin/featured">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Featured Products</span>
                </a>
            </li>
            <li class="active">
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
            <a href="#" class="profile">
                <img src="/assets/people.png">
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
                                    <img src="/{{ $battery->image }}">
                                    <p>{{ $battery->name}}</p>
                                </td>
                                <td><span class="status completed">{{ $battery->mvgi}}</span></td>
                                <td><a href="#" onclick="removeProduct('{{ $battery->name }}')" class="delete"><i class="fa-solid fa-trash-can"></i> Delete </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal hidden">
                <form id="add-product-form" class="add-product-form" enctype="multipart/form-data">
                    <h1>Add Product</h1>
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image">
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
                    <button type="button" id="cancel">Cancel</button>
                </form>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="/script.js"></script>
    <script>
        const add = document.getElementById('add-button');
        const modal = document.querySelector('.modal');
        const cancel = document.getElementById('cancel');

        function removeProduct(name){
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
                    console.log("Did not work ", error.responseJSON.errors); // Log the validation errors
                }
            });
        }
        add.addEventListener('click', function() {
            modal.classList.remove('hidden')
            modal.classList.add('active');
        });
        cancel.addEventListener('click', function() {
            modal.classList.remove('active');
            modal.classList.add('hidden');
        });
        $('#add-product-form').submit((event)=>{
            event.preventDefault();
            let imageFile=$("#image")[0].files[0];
            let name=$("#name").val();
            let mvgi=$("#mvgi").val();
            let jis_type=$("#jis_type").val();
            let warranty=$("#warranty").val();
            let description=$("#description").val();
            let csrfToken = $('meta[name="csrf-token"]').attr('content'); 
            var form_data=new FormData();
            form_data.append('image',imageFile);
            form_data.append('name',name);
            form_data.append('mvgi',mvgi);
            form_data.append('jis_type',jis_type);
            form_data.append('warranty',warranty);
            form_data.append('description',description);
            $.ajax({
                type: "POST",
                url: "/addProduct",
                data:form_data,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                success: function(response) {
                    Swal.fire("Success!", "Product added successfully.", "success");
                    location.reload();
                },
                error: function(error) {
                    console.log("Did not work ", error.responseJSON.errors); // Log the validation errors
                }
            });
        });
    </script>
</body>

</html>