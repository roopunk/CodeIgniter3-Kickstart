<div id="header">
    <div>
        <div class="dispinlineblock fleft p10">
            <h1 class="vlarge cntr">My Site</h1>
            <div class="small">
                About my site
            </div>
        </div>
        <div class="dispinlineblock fright w200">
            <?php 
                if(!empty($loggedIn)) 
                    echo '<a href="'.site_url('user/logout').'">Logout</a>';
                else echo '<a href="'.site_url('user/login').'">Login</a>';
            ?>
        </div>
    <div class="clear"></div>
    </div>
</div>

