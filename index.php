<?php

include_once __DIR__ . '/vendor/autoload.php';

$executionStartTime = microtime(true);
$character = new Challenge\Character();
$episodes = (new Challenge\Episodes());
$locations = (new Challenge\Locations());

echo "Cantidad de veces que aparece la letra c en character {$character->getCount('c')} <br/>";
echo "Cantidad de veces que aparece la letra I en location {$locations->getCount('I')} <br/>";
echo "Cantidad de veces que aparece la letra e en episode  {$episodes->getCount('e')} <br/>";
$executionEndTime = microtime(true);

$seconds = $executionEndTime - $executionStartTime;
echo "<b>El contador duro {$seconds} segundos aproximadamente <br/>";
