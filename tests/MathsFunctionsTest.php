<?php


use GuzzleHttp\Client;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MathsFunctionsTest extends TestCase
{
  private Client $client;
  private string $baseUri = 'http://localhost:8765/';

  protected function setUp(): void
  {
    $this->client = new Client([
        'base_uri' => $this->baseUri,
    ]);
  }

  #[DataProvider('provideSquareTestCases')]
  public function testMathsFunctionSquare(int $input, int $expected): void
  {
    $response = $this->client->get("/square/{$input}");

    $data = json_decode($response->getBody(), true);
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals($expected, $data['result']);
  }

  public static function provideSquareTestCases(): array
  {
    return [
        'puissance carré de 5' => [5, 25],
        'puissance carré de 0' => [0, 0],
        'puissance carré de 3' => [3, 9],
        'puissance carré de -4' => [-4, 16],
        'puissance carré de 10' => [10, 100],
    ];
  }

  #[DataProvider('provideCubeTestCases')]
  public function testMathsFunctionSquare3(int $input, int $expected): void
  {
    $response = $this->client->get("/cube/{$input}");

    $data = json_decode($response->getBody(), true);
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals($expected, $data['result']);
  }

  public static function provideCubeTestCases(): array
  {
    return [
        'puissance cubique de 5' => [5, 125],
        'puissance cubique de 0' => [0, 0],
        'puissance cubique de 3' => [3, 27],
        'puissance cubique de -4' => [-4, -64],
        'puissance cubique de 10' => [10, 1000],
    ];
  }

  #[DataProvider('provideSquarerootTestCases')]
  public function testMathsFunctionSquareroot(int $input, float $expected): void
  {
    $response = $this->client->get("/squareroot/{$input}");

    $data = json_decode($response->getBody(), true);
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEqualsWithDelta($expected, $data['result'], 0.01);
  }

  public static function provideSquarerootTestCases(): array
  {
    return [
        'racine carré de 25' => [25, 5.0],
        'racine carré de 0' => [0, 0.0],
        'racine carré de 81' => [81, 9.0],
        'racine carré de 100' => [100, 10.0],
        'racine carré de 2' => [2, 1.414],
    ];
  }

  #[DataProvider('provideLnTestCases')]
  public function testMathsFunctionLn(float $input, float $expected): void
  {
    $response = $this->client->get("/ln/{$input}");

    $data = json_decode($response->getBody(), true);
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEqualsWithDelta($expected, $data['result'], 0.01);
  }

  public static function provideLnTestCases(): array
  {
    return [
        'ln de 1' => [1.0, 0.0],
        'ln de 2.718281828' => [2.718281828, 1.0],
        'ln de 10' => [10.0, 2.302585093],
        'ln de 100' => [100.0, 4.605170186],
    ];
  }

}
