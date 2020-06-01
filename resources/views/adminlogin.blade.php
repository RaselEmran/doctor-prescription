<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/assets/images/favicon.png')}}">
    <title>Doctor Login Panel</title>
    <!-- Custom CSS -->
    <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">

                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{asset('backend/assets/images/login.png')}}" alt="logo" width="150px" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" action="{{route('admin.login')}}" method="post">
                        {{csrf_field()}}
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" >
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                
                                        <button type="submit" class="btn btn-success float-right" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
              <div style="margin-top: 15px;background: #eee;padding: 5px" >
                  <pre><p>Doctor: <span id="doc_email">doctor@gmail.com</span> pass:<span id="doc_pass">258147</span> <span class="btn btn-info" id="doc_get">get</span></p></pre>

                   <p>Assistant: <span id="as_email">as@gmail.com</span> pass:<span id="as_pass">123456</span> <span class="btn btn-info" id="as_get">get</span></p>
              </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{asset('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('backend/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
          @if(session('msg'))
        
                toastr.error('{{session('msg')}}');
                <?php 
          Session::put('msg',null);
                 ?>
          @endif

             @if(session('log'))
        
                toastr.success('{{session('log')}}');
          @endif

    @if ($errors->any())
      @foreach ($errors->all() as $error)
        
                toastr.error('{{$error}}');
      @endforeach
     @endif
    </script>
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    $("#doc_get").click(function(){
       var a= $("#doc_email").text();
       var b =$("#doc_pass").text();
       $("#email").val(a);
       $("#password").val(b);

        console.log(a);
    });

      $("#as_get").click(function(){
       var a= $("#as_email").text();
       var b =$("#as_pass").text();
       $("#email").val(a);
       $("#password").val(b);
    });
    </script>

</body>

</html>