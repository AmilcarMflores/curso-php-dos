<?php

require_once 'functions.php';

$data = get_data(API_URL);
$untilMessage = get_until_message($data["days_until"]);

$date = new DateTime($data["release_date"]);

// Formateador de fechas en español
$formatter = new IntlDateFormatter(
    'es_ES', 
    IntlDateFormatter::LONG, 
    IntlDateFormatter::NONE, 
    'UTC', 
    IntlDateFormatter::GREGORIAN
);

$releaseDate = $formatter->format($date);


?>

<main>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>" style="border-radius: 16px;" />
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> - <?= $untilMessage?></h3>
        <!--<p>Fecha de estreno: <?= $data["release_date"]; ?></p>-->
        <p>Fecha de estreno: <?= $releaseDate; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<style>
    /* Define el esquema de color del documento */
    :root {
        color-scheme: light dark;
    }

    * {
        font-family: "Roboto", sans-serif;
    }
    /* Centra el contenido del body usando grid */
    body {
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }

</style>
