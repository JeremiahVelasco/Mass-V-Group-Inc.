<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/MVG Circle 1001 Logo PNG 2 - RGB.png">
    <link rel="stylesheet" href="/index.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Employee Register</title>
</head>

<body class="login">
    <img id="form-logo" src="/assets/MVG Circle 1001 Logo PNG 2 - RGB.png" alt="Mass V Group Logo">
    <h1>Register</h1>
    <form id="login-form">
        <input type="text" placeholder="Username" id="username" >
        <small id="username-err"></small>
        <input type="password" placeholder="Password" id="password">
        <small id="password-err"></small>
        <input type="password" placeholder="Confirm Password" id="confirm-password" disabled>
        <small id="confirm-password-err"></small>
        <button type="submit" id="login-btn">Register</button>
        <a href="/admin">Already have an account?Click Here</a>
    </form>
    <script>
        //********************************Input events and validations*********************
        function promptInputEvents(id,field,err_prompt){
            const inputField=document.querySelector(id);
            const action=(field==='password')?'input':'change'
            inputField.addEventListener(action,()=>{
                const input=inputField.value;
                validationHandler(input,field,err_prompt)
            })
        }
        function validationHandler(input,field,err){
            if(field==='username'){return validateUsername(input,err)}
            if(field==='password'){return validatePassword(input,err)}
            validateConfPass(input,err);
        }
        function usernameExists(input){
            $.ajax({
                type:"GET",
                url:"/username-exists",
                data:{
                    'username':input
                },
                success:function(response){
                    if(response.success){
                        $("#username-err").text("Username Already Exists!");
                        return true;
                    }
                    console.log("Sike")
                    return false;
                },
                error:function(error){
                    console.error('Failed to check usernames: ',error);
                }
            })
        }
        function validateUsername(input,err_prompt){
            let message=document.querySelector(err_prompt);
            if(input.length<=0){
                message.textContent="Username is required!";
                return false;
            }
            if(usernameExists(input)){
                return false;
            }
            message.textContent="";
            return true;
        }
        function validatePassword(input,err_prompt){
            let message=document.querySelector(err_prompt);
            const confirm_password_field=document.querySelector('#confirm-password');
            if(input.length<=0){
                message.textContent="Password is required!";
                confirm_password_field.setAttribute('disabled',true);
                return false;
            }
            if(input.length<8){
                message.textContent="Passwords must have at least 8 characters!"
                confirm_password_field.setAttribute('disabled',true);
                return false;
            }
            message.textContent="";
            confirm_password_field.removeAttribute('disabled');
            return true;
        }
        function validateConfPass(input,err_prompt){
            let message=document.querySelector(err_prompt);
            let password=$('#password').val();
            if(input.length<=0){
                message.textContent="Confirmed password is required!";
                return false;
            }
            if(input!==password){
                message.textContent="Confirmed password does not match with password!";
                return false;
            }
            message.textContent="";
            return true;
        }
        promptInputEvents('#username','username','#username-err');
        promptInputEvents('#password','password','#password-err');
        promptInputEvents('#confirm-password','confirm_password','#confirm-password-err');
        //*********************************Form Submission*********************************
        function submitForm(){
            const username=$("#username").val();
            const password=$("#password").val();
            let token=$('meta[name="csrf-token"]').attr("content");
            $.ajax({
                type:"POST",
                url:"/registeradmin",
                data:{
                    'username':username,
                    'password':password,
                },
                headers:{
                    'X-CSRF-TOKEN': token
                },
                success:function(response){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Successfuly Registered',
                        showConfirmButton: true,
                        confirmButtonText:'Go to Login',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //Goto login
                            window.location.href='/admin';
                        }
                    });
                },
                error:function(error){
                    console.error("Failed to register data: ",error);
                }
            })
        }
        $("#login-form").submit((event)=>{
            event.preventDefault();
            const username=$("#username").val();
            const password=$("#password").val();
            const confirm_password=$("#confirm-password").val();
            let form_validations={
                username:validateUsername(username,'#username-err'),
                password:validatePassword(password,"#password-err"),
                confPass:validateConfPass(confirm_password,"#confirm-password-err")
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