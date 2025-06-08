<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div class=lewy>
        <section id="lewy1">
            <br>
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php 
                    $con = mysqli_connect("localhost", "root", "", "wedkowanie");
                    $kw = mysqli_query($con, "SELECT nazwa, akwen, wojewodztwo FROM ryby, lowisko WHERE lowisko.Ryby_id = ryby.id AND lowisko.rodzaj = 3;");
                    for ($i=0; $i < mysqli_num_rows($kw); $i++) { 
                        $row = mysqli_fetch_row($kw);
                        echo("<li>" . $row[0] . " pływa w rzece " . $row[1] . ", " . $row[2] . "</li>");
                    }
                    mysqli_close($con);
                ?>
            </ol>
        </section>
        <section id="lewy2">
            <h3>Ryby drapieżne naszych wód</h3>
            <br>
            <table>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                $con = mysqli_connect("localhost", "root", "", "wedkowanie");
                $kw = mysqli_query($con, "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;");
                for ($i=0; $i < mysqli_num_rows($kw); $i++) {
                    $row = mysqli_fetch_row($kw);
                    echo("<tr><td>"  . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>");
                }
                mysqli_close($con);
                ?>
            </table>
        </section>
    </div>
    <section class="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <footer>
        <p>Stronę wykonał: Cezary Kotlarski</p>
    </footer>
</body>
</html>