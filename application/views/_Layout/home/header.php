<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Remote Inc   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <?php if (!empty($this->session->userdata('USER_ID')) && $this->session->userdata('USER_ID') > 0) { ?>
                    <!-- User isLogin -->
                    <a href="<?= base_url('User/Panel') ?>" class="btn btn-primary my-2 my-sm-0">My Panel</a> &nbsp;
                    <a href="<?= base_url('User/changePassword') ?>" class="btn btn-primary my-2 my-sm-0">Change Password</a> &nbsp;
                    <a href="<?= base_url('User/logout') ?>" class="btn btn-danger my-2 my-sm-0">Logout</a>
                <?php } else { ?>
                    <!-- User not Login -->
                    <a href="<?= base_url('User/registration') ?>" class="btn btn-info my-2 my-sm-0">Register</a> &nbsp;
                    <a href="<?= base_url('User/login') ?>" class="btn btn-success my-2 my-sm-0">Login</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <br>
