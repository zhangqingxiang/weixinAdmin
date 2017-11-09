
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap -->
    <link href="../../gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../gentelella/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="loginForm" role="form" action="login/check" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="username" required="" name='username'/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="password" required="" name='password'/>
              </div>
              <div>
                <button type='button' id='loginButton' class="btn btn-default submit">Login In</button>
                
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>
              <div class="separator">
                    <p>
                        <span id="operTip" class="">&nbsp;</span>
                    </p>
                    <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                    </div>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>

      </div>
    </div>

    <!-- jQuery -->
    <script src="../../gentelella/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript" src="../../gentelella/vendors/bootstrap-validator/dist/js/bootstrapValidator.js"></script>

    <script type="text/javascript">

        // $(document).ready(function() {
        //     $.ajax({
        //         url: "../index.php/login/logout"
        //     });

        // });
        document.onkeydown=function(event){
            var e = event || window.event || arguments.callee.caller.arguments[0];
            if(e && e.keyCode==27){ // 按 Esc 
                //要做的事情
              }
            if(e && e.keyCode==113){ // 按 F2 
                 //要做的事情
               }            
             if(e && e.keyCode==13){ // enter 键
                 $('#loginButton').click();
            }
        }; 

        $('#loginButton').click(function(){
            $.ajax({
                type: "post",
                url: "../Login/check",
                data: $('#loginForm').serialize(),
                dataType: 'json',
                async: false,
                error: function(request) {
                    alert("Connection error");
                },
                success: function(result) {
                    console.log(result);
                    if (result.ret == 1)
                        window.location.href='main/home';
                    else {
                        $("#operTip").addClass('text-warning').html('用户名或密码错误！');
                    }
                }
            });
        })
    </script>
  </body>
</html>
