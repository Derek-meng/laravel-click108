<?php

namespace Jubilee\Click108\Tests\Unit;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Jubilee\Click108\Entries\TwelveConstellations;
use Jubilee\Click108\Http\Requests\IndexRequest;
use Jubilee\Click108\Repositories\TwelveConstellationsRepo;
use Jubilee\Click108\Services\TwelveConstellationsService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class TwelveConstellationsServiceTest extends TestCase
{
    public function testLists()
    {
        $now = Carbon::now();
        $orm = new TwelveConstellations([
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
        /** @var TwelveConstellationsRepo|MockObject $repo */
        $repo = $this->getMockBuilder(TwelveConstellationsRepo::class)->getMock();
        $repo->method('book')->willReturn(Collection::make([$orm]));
        $repo->method('total')->willReturn(1);
        $request = new IndexRequest(['page' => 1, 'perPage' => 10]);
        $service = new TwelveConstellationsService($repo);
        $result = $service->lists($request);
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
        $ormCollection = $result->getCollection();
        $this->assertInstanceOf(Collection::class, $ormCollection);
        $ormCollection->map(function ($orm) {
            $this->assertInstanceOf(TwelveConstellations::class, $orm);
        });
    }
}
