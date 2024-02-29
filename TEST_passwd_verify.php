<?php
// See the password_hash() example to see where this came from.
$pass = 'rasmuslerdorf';
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
echo "
TEXT password     : $pass <br>
hashed password   : $hash <br>";

echo '<br> <br> <br>';

if (password_verify($pass, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>