<?php

namespace Xefi\Faker\RoRo\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0[237]\d{8}$/', $this->faker->phoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^07[2-8]\d \d{3} \d{3}$/', $this->faker->spacedCellPhoneNumber());
        }
    }

    public function testLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0([23]1 \d{3} \d{4}|[23]\d{2} \d{3} \d{3})$/', $this->faker->spacedLandlinePhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+40[237]\d{8}$/', $this->faker->indicatoredPhoneNumber());
        }
    }

    public function testIndicatorIsSeparatedFromTheNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertStringStartsWith('+40 ', $this->faker->spacedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+40-', $this->faker->dashedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+40.', $this->faker->dottedIndicatoredPhoneNumber());
            $this->assertMatchesRegularExpression('/^\+40\d+$/', $this->faker->indicatoredPhoneNumber());
        }
    }
}
