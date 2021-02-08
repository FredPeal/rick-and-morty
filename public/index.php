<?php

include_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$executionStartTime = microtime(true);
$character = new Challenge\Character();
$episodes = (new Challenge\Episodes());
$locations = (new Challenge\Locations());

echo "Cantidad de veces que aparece la letra c en character {$character->getCount('c')} <br/>";
echo "Cantidad de veces que aparece la letra I en location {$locations->getCount('I')} <br/>";
echo "Cantidad de veces que aparece la letra e en episode  {$episodes->getCount('e')} <br/>";
$executionEndTime = microtime(true);

$seconds = $executionEndTime - $executionStartTime;
echo "<b>El contador duro {$seconds} segundos aproximadamente <br/></b>";
$executionStartTime = microtime(true);

$episodes->characters = $character->getResults();
echo '<h3>Esta es la parte dos del test</h3>';
foreach ($episodes->getLocationsByCharacter() as $episode) {
    $countLocation = count($episode['locations']);
    echo "<ol>
            <li> Episode {$episode['name']}, cantidad de location por personaje {$countLocation}
                <ul>";

    foreach ($episode['locations'] as $key => $location) {
        echo "<li>Id {$key} Nombre {$location} </li>";
    }
    echo '</ul>
            </li>
        </ol>
    ';
    $executionEndTime = microtime(true);
    $seconds = $executionEndTime - $executionStartTime;

    echo "<b>La parte dos tomo {$seconds} aproximadamente <br/></b>";
}
