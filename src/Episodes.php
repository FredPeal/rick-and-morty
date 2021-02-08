<?php

namespace Challenge;

class Episodes extends Base
{
    public array $characters = [];

    /**
     * __construct.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setEndpoint('episode');
    }

    /**
     * getLocationsByCharacter.
     *
     * @return array
     */
    public function getLocationsByCharacter() : array
    {
        $characters = $this->characters ? $this->characters : Character::find();
        foreach ($this->results as $key => $result) {
            $this->results[$key]['locations'] = [];
            foreach ($result['characters'] as $character) {
                preg_match("/[^\/]+$/", $character, $matches);
                $characterKey = array_search($matches[0], array_column($characters, 'id'));
                $character = $characters[$characterKey];
                $location = $character['location'];
                preg_match("/[^\/]+$/", $location['url'], $matchesLocation);
                $locationId = $matchesLocation ? $matchesLocation[0] : $location['name'];
                $this->results[$key]['locations'][$locationId] = $location['name'];
            }
        }
        return $this->results;
    }
}
