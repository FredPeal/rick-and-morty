<?php

namespace Challenge;

class LocationsCest
{
    /**
     * getCountTest.
     *
     * @param  IntegrationTester $I
     *
     * @return void
     */
    public function getCountTest(IntegrationTester $I) : void
    {
        $locations = new Locations();
        $count = $locations->getCount('e');
        $I->assertTrue(is_numeric($count));
        $I->assertTrue($count >= 0);
    }

    /**
     * endpointTest.
     *
     * @param  IntegrationTester $I
     *
     * @return void
     */
    public function endpointTest(IntegrationTester $I) : void
    {
        $endpoint = 'location';
        $locations = new Locations();
        $locations->setEndpoint($endpoint);
        $endpointResult = $locations->getEndpoint();
        $I->assertIsString($endpoint);
        $I->assertEquals($endpoint, $endpointResult);
    }

    /**
     * findTest.
     *
     * @param  IntegrationTester $I
     *
     * @return void
     */
    public function findTest(IntegrationTester $I) : void
    {
        $locations = new Locations();
        $results = $locations->find();
        $I->assertIsArray($results, 'The result is not array');
        $I->assertIsIterable($results, 'The result is not iterable');
        $I->assertArrayHasKey('id', $results[0]);
    }
}
