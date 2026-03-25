<?php

namespace App\Tests;

require_once "./classes/Database.php";

use App\Classes\Database;
use PHPUnit\Framework\TestCase;
use PDO;

class DatabaseTest extends TestCase
{
    private $pdo;
    private $database;

    protected function setUp(): void {
        $this->database = new Database();
        $this->database->createTable();
        $this->database->insertExampleData();
    }

    public function testDatabaseConnectionAndInsert(): void {
        $this->assertEquals(0, $this->database->getEventCount(), "Event Count should be zero");
        $result = $this->database->query("
        INSERT INTO events (_category, date, time, _hometeam, _awayteam, description)
        VALUES
            (
             1,
             '2026-03-25',
             '12:00:00',
             1,
             2,
             'Ducimus beatae'
        )");
        $this->assertInstanceOf(\PDOStatement::class, $result, "Result of inserting should be PDO Statement");
        $this->assertEquals(1, $this->database->getEventCount(), "Event Count should be 1");
    }
}
