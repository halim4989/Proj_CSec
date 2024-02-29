<!DOCTYPE html>
<html>
<title>LogIn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS and other files -->
<?php require 'lib\online_sauce.html' ?>
<!-- <?php require 'lib\ofline_sauce.html' ?> -->


<body>

    <?php
    // define variables and set to empty values
    $id = $input = $pass = $passH = $vfy = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = test_input($_POST["ac_id"]);
        $input = test_input($_POST["input"]);
    }

    function test_input($data)
    // 1. Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
    // 2. Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
    // 3. Pass all variables through PHP's htmlspecialchars() function. To prevent Cross Site Scripting (XSS) commands to execute.
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>


    <div class="w3-display-container w3-display-topmiddle" style="width: 60%; top: 7em; ">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="w3-padding w3-card-4 w3-light-grey w3-text-green w3-margin">
        <!-- The htmlspecialchars() function converts special characters to HTML entities.
        it will replace HTML characters like < and > with &lt; and &gt;. This prevents attackers from 
        exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.  

        The $_SERVER["PHP_SELF"] is a super global variable that returns 
        the filename of the currently executing script.     -->


            <h2 class="w3-center">LogIn</h2>

            <!-- <div class="w3-row w3-section">
                <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-user"></i></div>
                <div class="w3-rest">
                    <input disabled class="w3-input w3-border" name="first" type="text" placeholder="First Name">
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-user"></i></div>
                <div class="w3-rest">
                    <input disabled class="w3-input w3-border" name="last" type="text" placeholder="Last Name">
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-envelope-o"></i></div>
                <div class="w3-rest">
                    <input disabled class="w3-input w3-border" name="email" type="text" placeholder="Email">
                </div>
            </div> -->

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-unlock-alt"></i></div>
                <div class="w3-rest">
                    <input class="w3-input w3-border" value="<?php echo $id; ?>" name="ac_id" type="text" placeholder="ACCOUNT ID">
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:30px"><i class="w3-xlarge fa fa-unlock-alt"></i></div>
                <div class="w3-rest">
                    <input class="w3-input w3-border" value="<?php echo $input; ?>" name="input" type="text" placeholder="Password">
                </div>
            </div>

            <button class="w3-button w3-block w3-section w3-green w3-ripple w3-padding">Send</button>
        </form>

        <div class="w3-padding w3-border w3-margin">




            <?php

            include_once 'lib\DB\connect.php';

            $sql = "SELECT `input_pass`, `password` FROM `admins` WHERE `id`= $id";
            // $result = $conn->query($sql);
            // $result = $conn->query($sql) or die($conn->error);
            // $result = $conn->query($sql) or die('Input ID');
            $result = $conn->query($sql) or die("<center><label style = 'color:red; font-size: xx-large;'>Input ID</label></center>");



            if ($row = $result->fetch_assoc()) {

                $pass = $row["input_pass"];
                $passH = $row["password"];
            } else {
                echo "<center><label style = 'color:red; font-size: xx-large;'>ID does not Exist!</label></center>";
                // echo "<h2>ID does not Exist</h2>";
            }



            $result->free_result();
            $conn->close();

            function pw_verify($input, $passH)
            {

                if (password_verify($input, $passH)) {
                    echo "<center><label style = 'color: green; font-size: large;'>Password is valid!</label></center>";
                } else {
                    echo "<center><label style = 'color:red; font-size: large;'>Invalid password!</label></center>";
                }
            }

            pw_verify($input, $passH);

            echo "<h2>info:</h2>
            ID         : $id  <br>
            input      : $input  <br>
            password   : $pass  <br>
            hash       : $passH  <br><br>
            ";

            ?>
        </div>

    </div>

    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php include 'UI\footer.php' ?>
    </a>
</body>

</html>