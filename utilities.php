<?php
//funktio joka luo region-pudotsvalikon
function createGenreDropDown() {
   
    // Muodosta tietokantayhteys
    require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
    // Lue genre get-parametri muuttujaan
   
    $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
    // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
    $sql = "SELECT DISTINCT genre FROM title_genres;";
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Tulosta otsikko
    $html = '<select name="genre">';
    // Looppaa tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<option>' . $row['genre'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}









