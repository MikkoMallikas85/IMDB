<?php
    // Muodosta tietokantayhteys
    require_once('../db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
    // Lue rating get-parametri muuttujaan

    $rating = $_GET['rating'];
    $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
    // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
    $sql = "SELECT DISTINCT primary_title
    FROM Titles
    INNER JOIN Title_ratings
    ON Titles.title_id = Title_ratings.title_id
    WHERE average_rating > 9.0 AND num_votes > 100000;";
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Tulosta otsikko
    $html = '<h1>' . $rating . '</h1>';
    // Avaa ul-elementti
    $html .= '<ul>';
    // Looppaa tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<li>' . $row['primary_title'] . '</li>';
    }
    $html .= '</ul>';
    echo $html;