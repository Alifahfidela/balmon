<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" id="form-user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Enter Account...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password2" placeholder="Konfirmasi Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                    <!-- <a href="<?=base_url()?>" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?=base_url()?>index.php/Register">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
<script>
    $(document).ready(function(){
        $('#form-user').submit(function(){
            event.preventDefault();
            const formdata = $(this).serializeArray();
            let data = {};
            $(formdata ).each(function(index, obj){
                data[obj.name] = obj.value;
            });
            if(data.password != data.password2){
              console.log('password tidak sama')
            }else if(data.username == ''){
              console.log('usernme kosong')
            }else{
              $.ajax({
                  url:'<?=base_url()?>index.php/Auth/Register',
                  method:'POST',
                  data:data
              }).done(function(msg){
                  const res = JSON.parse(msg);
                  if(res.res == true){
                    window.location.replace('<?=base_url()?>index.php/Auth/Redirect')
                  }
              })

            }
        })
    })
</script>