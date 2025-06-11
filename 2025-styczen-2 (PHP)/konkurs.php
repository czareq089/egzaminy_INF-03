<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <section id="lewy">
        <h3>Konkursowe nagrody</h3>
        <button onclick="window.location.reload()">Losuj nowe nagrody</button>
        <table>
            <tr>
                <th>Nr</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Wartość</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "konkurs");
            $kw = mysqli_query($con, "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;");
            for ($i=0; $i < mysqli_num_rows($kw); $i++) { 
                $row = mysqli_fetch_row($kw);
                echo("<tr><td>" . $i+1 . "</td><td>" . $row[0] . " </td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>");
            }
            mysqli_close($con);
            ?>
        </table>
    </section>
    <section id="prawy">
        <img src="puchar.png" alt="Puchar dla wolontariusza">
        <h4>Polecane Linki</h4>
        <ul>
            <li>
                <a href="kw1.png">Kwerenda1</a>
            </li>
            <li>
                <a href="kw2.png">Kwerenda2</a>
            </li>
            <li>
                <a href="kw3.png">Kwerenda3</a>
            </li>
            <li>
                <a href="kw4.png">Kwerenda4</a>
            </li>
        </ul>
    </section>
    <footer>
        <p>Stronę wykonał: Cezary Kotlarski</p>
    </footer>
</body>
</html>