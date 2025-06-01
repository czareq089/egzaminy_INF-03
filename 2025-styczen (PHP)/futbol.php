<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </header>
    <section>
        <?php
            $con = mysqli_connect("localhost", "root", "", "egzamin");
            $num = 1;
            $id = mysqli_num_rows(mysqli_query($con, "SELECT id FROM rozgrywka"));
            $k1 = mysqli_query($con, "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka");
            mysqli_close($con);
            echo '<section id="bloki">';
            for ($i=0; $i < $id; $i++) { 
                $w1 = mysqli_fetch_array($k1);
                echo '<div class="rozgrywki"><h3> '.$w1[0].' - '.$w1[1].'</h3><h4>'.$w1[2].'</h4><p>w dniu: '.$w1[3].'</p></div>';
            }
            echo '</section>'; 
            ?>
    </section>  
    <main>
        <h2>Reprezentacja Polski</h2>
    </main>
    <section id="divy">
        <div id="lewy">
            <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
            <form method="POST" action="futbol.php">
                <input type="number" min="1" max="4" name="numer">
                <input value="Sprawdź" type="submit">
            </form>
            <ul>
            <?php
            $con = mysqli_connect("localhost", "root", "", "egzamin");
            $num = isset($_POST['numer']) ? $_POST['numer'] : null;
            
            if(!is_null($num)){
                $k2 = mysqli_query($con, "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $num; ");
                $id2 = mysqli_num_rows($k2);
                for ($i=0; $i < $id2; $i++) { 
                $w2 = mysqli_fetch_array($k2);
                echo '<li>'.$w2[0].' '.$w2[1].'</li>';
            }
            }
            mysqli_close($con);
            ?>
            </ul>
    </div>
     <div id="prawy">
            <img src="zad1.png" alt="piłkarz">
            <p>Autor: Cezary Kotlarski</p>
    </div>
        </section>
</body>
</html>
