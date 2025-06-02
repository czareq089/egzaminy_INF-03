<?php
if(isset($_POST['submit'])){
    $con = mysqli_connect('localhost', 'root', '', 'wedkowanie');
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];

    mysqli_query($con, "INSERT INTO karty_wedkarskie SET punkty = NULL, imie = '" . $imie . "', nazwisko = '" . $nazwisko . "', adres = '" . $adres . "', data_zezwolenia = NULL");
    mysqli_close($con);
    header('Location:/karta.html');
}
?>