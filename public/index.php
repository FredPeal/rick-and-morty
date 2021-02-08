<?php

include_once __DIR__ . '/../vendor/autoload.php';
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
}

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views/');
$twig = new \Twig\Environment($loader);

$executionStartTime = microtime(true);

$character = new Challenge\Character();
$episodes = (new Challenge\Episodes());
$locations = (new Challenge\Locations());

// Step 1
$countCharacter = $character->getCount('c');
$countLocation = $locations->getCount('I');
$countEpisode = $episodes->getCount('e');
$characters = $character->getResults();;
$executionEndTime = microtime(true);
$secondCounter = $executionEndTime - $executionStartTime;

// Step 2
$executionStartTime = microtime(true);
$episodes->characters = $characters;
$locationsByCharacter = $episodes->getLocationsByCharacter();
$executionEndTime = microtime(true);
$secondStepTwo = $executionEndTime - $executionStartTime;

echo $twig->render('base.html', [
    'character' => $characters[rand(0, count($characters) - 1)],
    'countCharacter' => $countCharacter,
    'countLocation' => $countLocation,
    'countEpisode' => $countEpisode,
    'secondCounter' => $secondCounter,
    'locationsByCharacter' => $locationsByCharacter,
    'secondStepTwo' => $secondStepTwo
]);
