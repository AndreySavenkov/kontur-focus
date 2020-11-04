<?php

namespace ASavenkov\KonturFocus\Tests;

use ASavenkov\KonturFocus\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testGetBriefReport()
    {
        $apiKey = getenv('API_KEY');
        $client = new Client($apiKey);
        $briefReport = $client->getBriefReport('6663003127');
        $this->assertIsObject($briefReport, 'Checking => BriefReport is object');
        $this->assertIsString($briefReport->getInn(), 'Checking => href is string');
        $this->assertIsString($briefReport->getOgrn(), 'Checking => href is string');
        $this->assertIsString($briefReport->getFocusHref(), 'Checking => focusHref is string');
        $this->assertIsString($briefReport->getHref(), 'Checking => href is string');
        $this->assertTrue($briefReport->isGreenStatements(), 'Checking => greenStatements is true');
        $this->assertNotTrue($briefReport->isRedStatements(), 'Checking => redStatements is false');
        $this->assertTrue($briefReport->isYellowStatements(), 'Checking => yellowStatements is true');
    }
}
