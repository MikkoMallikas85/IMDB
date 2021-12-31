<?php
    // Muodosta tietokantayhteys
    require_once('../db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
    // Lue length get-parametri muuttujaan
    $length = $_GET['length'];
    $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
    // Muodosta SQL-lause muuttujaan.
    $sql = "SELECT primary_title from Titles WHERE runtime_minutes > 200
    LIMIT 10;";
    // kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Tulosta otsikko
    $html = '<h1>' . $length . '</h1>';
    // Avaa ul-elementti
    $html .= '<ul>';
    // Looppaa tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<li>' . $row['primary_title'] . '</li>';
    }
    $html .= '</ul>';
    echo $html;