<?php

namespace Challenge;

class EpisodesCest
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
        $episodes = new Episodes();
        $count = $episodes->getCount('e');
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
        $endpoint = 'episode';
        $episodes = new Episodes();
        $episodes->setEndpoint($endpoint);
        $endpointResult = $episodes->getEndpoint();
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
        $episodes = new Episodes();
        $results = $episodes->find();
        $I->assertIsArray($results, 'The result is not array');
        $I->assertIsIterable($results, 'The result is not iterable');
        $I->assertArrayHasKey('id', $results[0]);
    }
}
