<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My usual calculation</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/fonts.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    

    <!-- Custom styles for this template-->
    
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <div class="user text-center">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="user" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">
                                        </div>
                                        <button id="loginBtn"  class="btn btn-primary">Login</button>
                                        <hr>
                                        
                                        
</div>
                                    <hr>
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

   
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/axios.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
   
    <script>
        
        $("#loginBtn").click(function(){
            var user = $('#user').val();
            var password = $('#password').val();
            

            console.log(password+user)

            axios.post('/LoginAdmin',{
                user:user, 
                password:password
                })
            .then(function(response){
                if(response.status ==200 && response.data == 1){
              
                window.location.href="/";
            }else{
              window.location.href="/login";
              
            }
            })
            .catch(function(error){
                window.location.href="/login";
            })
         
        })
        
       
        
    </script>
   
</body>

</html>