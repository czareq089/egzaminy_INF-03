<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Forum o psach</title>
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <div class="container">
        <section class="lewy"><img src="obraz.jpg" alt="foksterier"></section>
        <div class="right-column">
            <section class="prawy">
                <br>
                <h2>Zapisz się</h2>
                <br>
                <form action="logowanie.php" method="post">
                    <label for="login">login: </label>
                    <input type="text" name="login">
                    <br>
                    <label for="haslo">hasło: </label>
                    <input type="password" name="haslo">
                    <br>
                    <label for="powtorz">powtórz hasło: </label>
                    <input type="password" name="powtorz">
                    <input type="submit" value="Zapisz">
                </form>
                <br>
                <?php
                        if('POST' === $_SERVER['REQUEST_METHOD']){
                            $con = mysqli_connect("localhost", "root", "", "psy");
                            $login = $_POST['login'];
                            $haslo = $_POST['haslo'];
                            $powtorz = $_POST['powtorz'];
                            $kw = mysqli_query($con, "SELECT login FROM uzytkownicy;");
                            $l = mysqli_num_rows($kw);
                            $loginy = array();
                            $flaga = false;

                            if(empty($login) || empty($haslo) || empty($powtorz)){
                                echo '<p>wypełnij wszystkie pola</p>';
                            }
                            else{
                                if($powtorz !== $haslo){
                                echo '<p>hasła nie są takie same, konto nie zostało dodane</p>';
                                }
                                else{
                                    for ($i=0; $i < $l; $i++) { 
                                        $loginy[] = mysqli_fetch_array($kw)[0];
                                    }
                                    if(in_array($login, $loginy)){
                                            echo '<p>Login występuje w bazie danych, konto nie zostało dodane</p>';
                                    }
                                    else{
                                        $haslo = sha1($haslo, FALSE);
                                        mysqli_query($con, "INSERT INTO uzytkownicy(login, haslo) VALUES ('" . $login . "', '" . $haslo . "');");
                                        echo '<p>Konto zostało dodane</p>';
                                    }
                            }}
                            mysqli_close($con);
                        }
                        ?>
            </section>
            <section class="prawy">
            <br>    
            <h2>Zapraszamy wszystkich</h2>
                <br>
                <ol>
                    <li>właścicieli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co chcą kupić psa</li>
                    <li>tych, co lubią psy</li>
                </ol>
                <br>
                <a href="regulamin.html" target="_blank">Przeczytaj regulamin forum</a>
            </section>
        </div>
    </div>
    <footer>Stronę wykonał: Cezary Kotlarski</footer>
</body>
</html>