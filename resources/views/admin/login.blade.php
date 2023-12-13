<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login</title>
</head>
<body class="login">
    <img id="form-logo" src="assets/MVG Circle 1001 Logo PNG 2 - RGB.png" alt="Mass V Group Logo">
    <h1>Login</h1>
    <form id="login-form">
        <input type="text" placeholder="Username" id="username">
        <small id='username-err'></small>
        <input type="password" placeholder="Password" id="password">
        <small id='password-err'></small>
        <button id="login-btn" type="submit">Login</button>
        <a href="/adminregister">New to MVG? Create Account</a>
    </form>
    <script>
        //********************************Input events and validations*********************
        function promptInputEvents(id,field,err_prompt){
            const inputField=document.querySelector(id);
            inputField.addEventListener('change',()=>{
                const input=inputField.value;
                validationHandler(input,field,err_prompt)
            })
        }
        function validationHandler(input,field,err){
            if(field==='username'){return validateUsername(input,err)}
            if(field==='password'){return validatePassword(input,err)}
        }
        function validateUsername(input,err_prompt){
            let message=document.querySelector(err_prompt);
            if(input.length<=0){
                message.textContent="Username is required!";
                return false;
            }
            message.textContent="";
            return true;
        }
        function validatePassword(input,err_prompt){
            let message=document.querySelector(err_prompt);
            if(input.length<=0){
                message.textContent="Password is required!";
                return false;
            }
            message.textContent="";
            return true;
        }
        //*********************************Form Submission*********************************
        function submitForm(form_data){
            let token=$('meta[name="csrf-token"]').attr("content");
            const username=$("#username").val();
            const password=$("#password").val();
            $.ajax({
                type:"POST",
                url:"/loginadmin",
                data:{
                    'user':username,
                    'password':password
                },
                headers:{
                    'X-CSRF-TOKEN': token
                },
                success:function(response){
                    if(response.success){
                        window.location.href='/admindashboard';
                    }
                    else{
                        $('#password-err').text('Incorrect Credentials!');
                    }
                },
                error:function(error){
                    console.error("Failed to register data: ",error);
                }
            })
        }
        $('#login-form').submit((event)=>{
            event.preventDefault();
            const username=$("#username").val();
            const password=$("#password").val();
            let form_validations={
                username:validateUsername(username,'#username-err'),
                password:validatePassword(password,"#password-err"),
            };
            const validation_keys=Object.keys(form_validations);
            let form_statuses=[];
            let forward=true;
            validation_keys.forEach(key=>{
                form_statuses.push(form_validations[key]);
            })
            for(const status in form_statuses){
                if(!status){
                    forward=false;
                }
            }
            if(!forward){return}
            submitForm();
        })
    </script>
</body>
</html>