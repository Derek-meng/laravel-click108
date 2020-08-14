<?php

namespace Jubilee\Click108\Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Jubilee\Click108\Entries\TwelveConstellations;
use Jubilee\Click108\Repositories\TwelveConstellationsRepo;
use PHPUnit\Framework\TestCase;

class TwelveConstellationsRepoTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateOrUpdate()
    {
        $repo = app(TwelveConstellationsRepo::class);
        $now = Carbon::now();
        $constellations = $repo->createOrUpdate([
            'name'            => 'test',
            'entire_score'    => 1,
            'entire_content'  => 'entire_content',
            'love_score'      => 1,
            'love_content'    => 'love_content',
            'career_score'    => 1,
            'career_content'  => 'career_content',
            'fortune_score'   => 1,
            'fortune_content' => 'fortune_content',
            'day'             => $now
        ]);
        $this->assertNotNull($constellations);
        $this->assertInstanceOf(TwelveConstellations::class, $constellations);
        $this->assertObjectHasAttribute('name', $constellations);
        $this->assertObjectHasAttribute('entire_score', $constellations);
        $this->assertObjectHasAttribute('entire_content', $constellations);
        $this->assertObjectHasAttribute('love_score', $constellations);
        $this->assertObjectHasAttribute('love_content', $constellations);
        $this->assertObjectHasAttribute('career_score', $constellations);
        $this->assertObjectHasAttribute('career_content', $constellations);
        $this->assertObjectHasAttribute('fortune_score', $constellations);
        $this->assertObjectHasAttribute('fortune_content', $constellations);
        $this->assertObjectHasAttribute('day', $constellations);
        $this->assertEquals('test', $constellations->name);
        $this->assertEquals(1, $constellations->entire_score);
        $this->assertEquals('entire_content', $constellations->entire_content);
        $this->assertEquals(1, $constellations->love_score);
        $this->assertEquals('love_content', $constellations->love_content);
        $this->assertEquals(1, $constellations->career_score);
        $this->assertEquals('career_content', $constellations->career_content);
        $this->assertEquals(1, $constellations->fortune_score);
        $this->assertEquals('fortune_content', $constellations->fortune_content);
        $this->assertEquals($now, $constellations->day);
    }
}
