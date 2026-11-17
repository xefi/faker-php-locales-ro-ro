<?php

namespace Xefi\Faker\RoRo\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\RoRo\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing(
            $this->companies,
            $results
        );
    }

    public function testCui(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $cui = $this->faker->cui();

            $this->assertMatchesRegularExpression('/^[1-9]\d{7,8}$/', $cui);
            $this->assertCuiIsValid($cui);
        }
    }

    public function testVat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $vat = $this->faker->vat();

            $this->assertMatchesRegularExpression('/^RO[1-9]\d{7,8}$/', $vat);
            $this->assertCuiIsValid(substr($vat, 2));
        }
    }

    private function assertCuiIsValid(string $cui): void
    {
        $number = str_pad(substr($cui, 0, -1), 9, '0', STR_PAD_LEFT);

        $sum = 0;
        foreach ([7, 5, 3, 2, 1, 7, 5, 3, 2] as $index => $weight) {
            $sum += (int) $number[$index] * $weight;
        }

        $controlDigit = ($sum * 10) % 11;

        $this->assertSame($controlDigit === 10 ? 0 : $controlDigit, (int) substr($cui, -1));
    }
}
