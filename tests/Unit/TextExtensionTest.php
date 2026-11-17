<?php

namespace Xefi\Faker\RoRo\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\RoRo\Extensions\TextExtension;

final class TextExtensionTest extends TestCase
{
    protected array $paragraphs = [];

    protected function setUp(): void
    {
        parent::setUp();

        $textExtension = new TextExtension(new Randomizer());
        $this->paragraphs = (new ReflectionClass($textExtension))->getProperty('paragraphs')->getValue($textExtension);
    }

    public function testWords(): void
    {
        $sentences = array_merge(...$this->paragraphs);
        $words = array_merge(...$sentences);
        $result = $this->faker->words(count($words));

        $result = preg_split('/\s+/', $result);
        $words = array_map(function ($word) { return strtolower(preg_replace('/[.,]/', '', $word)); }, $words);

        $this->assertEqualsCanonicalizing(
            $words,
            $result
        );
    }

    public function testSentences(): void
    {
        $sentences = array_map(function ($sentence) { return implode(' ', $sentence); }, array_merge(...$this->paragraphs));

        foreach ($this->faker->sentencesAsArray(3) as $sentence) {
            $this->assertContains(implode(' ', $sentence), $sentences);
        }
    }

    public function testParagraphs(): void
    {
        $paragraphs = array_map(function ($sentences) { return implode(' ', array_merge(...$sentences)); }, $this->paragraphs);

        foreach (explode(PHP_EOL, $this->faker->paragraphs(2)) as $paragraph) {
            $this->assertContains($paragraph, $paragraphs);
        }
    }
}
