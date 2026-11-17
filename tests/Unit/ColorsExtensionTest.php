<?php

namespace Xefi\Faker\RoRo\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;
use Xefi\Faker\RoRo\Extensions\ColorsExtension;

final class ColorsExtensionTest extends TestCase
{
    protected array $safeColorNames = [];
    protected array $colorNames = [];

    protected function setUp(): void
    {
        parent::setUp();

        $colorsExtension = new ColorsExtension(new Randomizer());
        $this->safeColorNames = (new ReflectionClass($colorsExtension))->getProperty('safeColorNames')->getValue($colorsExtension);
        $this->colorNames = (new ReflectionClass($colorsExtension))->getProperty('colorNames')->getValue($colorsExtension);
    }

    public function testColorSetsKeepTheBaseSize(): void
    {
        $baseColorsExtension = new BaseColorsExtension(new Randomizer());
        $reflection = new ReflectionClass($baseColorsExtension);

        $this->assertCount(count($reflection->getProperty('safeColorNames')->getValue($baseColorsExtension)), $this->safeColorNames);
        $this->assertCount(count($reflection->getProperty('colorNames')->getValue($baseColorsExtension)), $this->colorNames);
    }

    public function testSafeColorNames(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->safeColorNames); $i++) {
            $results[] = $this->faker->unique()->safeColorName();
        }

        $this->assertEqualsCanonicalizing(
            $this->safeColorNames,
            $results
        );
    }

    public function testColorNames(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->colorNames); $i++) {
            $results[] = $this->faker->unique()->colorName();
        }

        $this->assertEqualsCanonicalizing(
            $this->colorNames,
            $results
        );
    }
}
