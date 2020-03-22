<div class="container">

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>

    <div class="jumbotron">
        <h1 class="display-4">Welcome to <?= $this->session->userdata('USER_NAME') ?></h1>

    </div>

<div class="row justify-content-center">
    <div class="col-md-8">
    		<h2 class="title text-primary m-0"><?php echo $page_title ?></h2>
        <?php echo form_open('user/changePassword', array('id' => 'passwordForm', 'autocomplete'=>'off'))?>
            <div class="form-group">
                <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Old Password" autocomplete="off" />
                <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
            </div>
            <div class="form-group">
                <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" autocomplete="off" />
                <?php echo form_error('newpass', '<div class="error">', '</div>')?>
            </div>
            <div class="form-group">
                <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Confirm Password" autocomplete="off" />
                <?php echo form_error('passconf', '<div class="error">', '</div>')?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Change Password</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
</div>
