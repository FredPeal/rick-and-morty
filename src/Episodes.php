<?php

namespace Challenge;

class Episodes extends Base
{
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
        $episodes = self::find();
    }
}
