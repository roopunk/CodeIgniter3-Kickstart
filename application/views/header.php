<?php 
    $loggedIn = baseCheckLogin();
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">My Site</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo site_url('pages/about'); ?>">About</a></li>
                <li><a href="<?php echo site_url('pages/contact'); ?>">Contact</a></li>
                <?php 
                    if(!empty($loggedIn)) 
                        echo '<li><a href="'.site_url('user/logout').'">Logout</a></li>';
                    else echo '<li><a href="'.site_url('user/login').'">Login</a></li>';
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
