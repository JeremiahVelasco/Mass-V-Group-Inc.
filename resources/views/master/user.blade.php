<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin.css">
    <link rel="icon" href="/assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MVG Master</title>
</head>

<body>
    @if(!session('mastersuccess'))
        <script>
            window.location.href="/admin";
        </script>
    @endif
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img class="logo" src="/assets/MVG Circle 1001 Logo PNG 2 - RGB.png" alt="">
            <span class="text">MVG Master</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="/master/dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/master/pending">
                    <i class='bx bxs-user-account'></i>
                    <span class="text">Grant Accounts</span>
                </a>
            </li>
            <li class="active">
                <a href="/master/user">
                    <i class='bx bxs-user-account'></i>
                    <span class="text">Users</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="/master/logout" class="logout">
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
                    <h1>Users</h1>

                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Current Users</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>NAME</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <p>{{$user->id}}</p>
                                </td>
                                <td><span class="status completed">{{$user->user}}</span></td>
                                <td><a href="#" onclick="removeUser({{ $user->id }})" class="delete"><i class="fa-solid fa-trash-can"></i> Delete </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="/script.js"></script>
    <script>
        function removeUser(id){
            let csrfHeader = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                    type: "POST",
                    url:"/delete-user",
                    data:{
                        'uid':id
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfHeader
                    },
                    success: function(response) {
                        // Update the details on the page
                        if (response.success) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: `UID ${id} deleted`,
                                showConfirmButton: true,
                                confirmButtonText:'Reload page',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    //Goto login
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function(error) {
                        console.log("Error accepting user", error);
                    }
            });
        }
    </script>
</body>

</html>