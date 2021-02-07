<?php

namespace Challenge;

class Locations extends Base
{
    /**
     * __construct.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setEndpoint('location');
    }
}
