<!DOCTYPE html>
<html>
<title>NEW ACCOUNT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS and other files -->
<?php require 'lib\online_sauce.html' ?>
<!-- <?php require 'lib\ofline_sauce.html' ?> -->

<body>
    <form method="post" action="<?php echo htmlspecialchars('lib\DB\new_admin.php'); ?>" 
    class="w3-display-container w3-padding w3-display-topmiddle w3-card-4 w3-light-grey w3-text-green w3-margin" style="width: 60%; top: 7em;">
        <h2 class="w3-center">New Account</h2>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-user"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="first" type="text" placeholder="First Name">
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-user"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="last" type="text" placeholder="Last Name">
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-envelope-o"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-phone"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone">
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-unlock-alt"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="password" type="text" placeholder="Password">
            </div>
        </div>

        <button class="w3-button w3-block w3-section w3-green w3-ripple w3-padding">Done</button>

    </form>

    <a href="TEST_passwd_verify.php">
        <?php include 'UI\footer.php' ?>
    </a>
</body>

</html>