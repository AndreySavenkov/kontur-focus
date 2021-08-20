<?php

namespace ASavenkov\KonturFocus\Tests;

use ASavenkov\KonturFocus\Client;
use ASavenkov\KonturFocus\Models\Analytics;
use ASavenkov\KonturFocus\Models\BriefReport;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function testGetBriefReport(): void
    {
        $apiKey = getenv('API_KEY');
        $client = new Client($apiKey);
        $briefReport = $client->getBriefReport(getenv('TEST_INN'));
        var_dump($briefReport);
        $this->assertInstanceOf(BriefReport::class, $briefReport);
        $this->assertIsObject($briefReport, 'Checking => BriefReport is object');
        $this->assertIsString($briefReport->inn, 'Checking => href is string');
        $this->assertIsString($briefReport->ogrn, 'Checking => href is string');
        $this->assertIsString($briefReport->focusHref, 'Checking => focusHref is string');
        $this->assertIsString($briefReport->href, 'Checking => href is string');
        $this->assertIsBool($briefReport->greenStatements, 'Checking => greenStatements is true');
        $this->assertIsBool($briefReport->yellowStatements, 'Checking => yellowStatements is false');
        $this->assertIsBool($briefReport->redStatements, 'Checking => redStatements is false');
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function testGetAnalytics(): void
    {
        $apiKey = getenv('API_KEY');
        $client = new Client($apiKey);
        $analytics = $client->getAnalytics(getenv('TEST_INN'));
        var_dump($analytics);
        $this->assertInstanceOf(Analytics::class, $analytics);
        $this->assertIsObject($analytics, 'Checking => BriefReport is object');
        $this->assertIsString($analytics->inn, 'Checking => href is string');
        $this->assertIsString($analytics->ogrn, 'Checking => href is string');
        $this->assertIsString($analytics->focusHref, 'Checking => focusHref is string');
        $this->assertIsBool($analytics->isMSP);
        $this->assertIsBool($analytics->isRNP);
    }
}
