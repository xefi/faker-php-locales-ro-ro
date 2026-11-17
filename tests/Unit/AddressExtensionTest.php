<?php

namespace Xefi\Faker\RoRo\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\RoRo\Extensions\AddressExtension;

final class AddressExtensionTest extends TestCase
{
    protected AddressExtension $extension;
    protected array $regions = [];
    protected array $counties = [];
    protected array $cities = [];
    protected array $streetTypes = [];
    protected array $streetNames = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->extension = new AddressExtension(new Randomizer());
        $reflection = new ReflectionClass($this->extension);

        $this->regions = $reflection->getProperty('regions')->getValue($this->extension);
        $this->counties = $reflection->getProperty('counties')->getValue($this->extension);
        $this->cities = $reflection->getProperty('cities')->getValue($this->extension);
        $this->streetTypes = $reflection->getProperty('streetTypes')->getValue($this->extension);
        $this->streetNames = $reflection->getProperty('streetNames')->getValue($this->extension);
    }

    public function testRegion(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->regions); $i++) {
            $results[] = $this->faker->unique()->region();
        }

        $this->assertEqualsCanonicalizing(
            $this->regions,
            $results
        );
    }

    public function testCounty(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->counties); $i++) {
            $results[] = $this->faker->unique()->county();
        }

        $flatten = function (array $county) { return array_key_first($county).':'.reset($county); };

        $this->assertEqualsCanonicalizing(
            array_map($flatten, $this->counties),
            array_map($flatten, $results)
        );

        foreach ($results as $county) {
            $this->assertCount(1, $county);
            $this->assertMatchesRegularExpression('/^[A-Z]{1,2}$/', (string) array_key_first($county));
        }
    }

    public function testCity(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->cities); $i++) {
            $results[] = $this->faker->unique()->city();
        }

        $this->assertEqualsCanonicalizing(
            $this->cities,
            $results
        );
    }

    public function testPostcode(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->postcode();

            $this->assertIsString($result);
            $this->assertMatchesRegularExpression('/^\d{6}$/', $result);
        }
    }

    public function testHouseNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->houseNumber();

            $this->assertIsInt($result);
            $this->assertGreaterThanOrEqual(1, $result);
            $this->assertLessThanOrEqual(200, $result);
        }
    }

    public function testStreetName(): void
    {
        for ($i = 0; $i < 100; $i++) {
            [$type, $name] = explode(' ', $this->faker->streetName(), 2);

            $this->assertContains($type, $this->streetTypes);
            $this->assertContains($name, $this->streetNames);
        }
    }

    public function testStreetAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^[\p{L} ]+ nr\. \d{1,3}$/u', $this->faker->streetAddress());
        }
    }

    public function testFullAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->fullAddress();

            $this->assertMatchesRegularExpression('/^[\p{L} ]+ nr\. \d{1,3}, \d{6} [\p{L}\- ]+$/u', $result);
            $this->assertContains(preg_replace('/^.*, \d{6} /', '', $result), $this->cities);
        }
    }
}
