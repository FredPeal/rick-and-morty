<?php

namespace Challenge;

class Character extends Base
{
    /**
     * __construct.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setEndpoint('character');
    }
}
