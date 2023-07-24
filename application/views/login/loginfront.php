<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-rB1DFHHVlHNqYF7fbZrPmSLzWzoW/lv3e5FziGhPzTz8Z5f2pA4DvmMHDI+e8D0e" crossorigin="anonymous">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>assets/index2.html"><b>Latihan</b>CI 3</a>
        </div>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?php if($this->session->userdata('errormsg')):?>
                <p class="text-danger"><?= $this->session->userdata('errormsg')?></p>
                <?php $this->session->unset_userdata('errormsg')?>
                <?php endif; ?>
                <?php if($this->session->userdata('successmsg')):?>
                <p class="text-success"><?= $this->session->userdata('successmsg')?></p>
                <?php $this->session->unset_userdata('successmsg')?>
                <?php endif; ?>
                <form action="<?= base_url() ?>Auth/post_login" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="userid" name="userid" placeholder="ID" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-id-card"></i>
                            </div>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4 mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <hr>

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>



</html>