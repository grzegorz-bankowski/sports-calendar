<?php
namespace App\Tests;

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class RequestTest extends TestCase
{
    public function testRealHttpStatus(): void {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:8000/');
        $response2 = $client->request('GET', 'http://localhost:8000/add-event');
        $response3 = $client->request('GET', 'http://localhost:8000/more?event=' .'1');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(200, $response2->getStatusCode());
        $this->assertEquals(200, $response3->getStatusCode());
    }
}

