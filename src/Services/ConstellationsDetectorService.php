<?php

namespace Jubilee\Click108\Services;

use Carbon\Carbon;
use Click108\Detector\TwelveConstellations;
use Click108\DTO\Day\TwelveConstellationsDTO;
use Illuminate\Database\Eloquent\Collection;
use Jubilee\Click108\Entries\TwelveConstellations as Models;
use Jubilee\Click108\Repositories\TwelveConstellationsRepo;

class ConstellationsDetectorService
{
    /** @var TwelveConstellations $client */
    private $client;
    /** @var TwelveConstellationsRepo $repo */
    private $repo;

    /**
     * ConstellationsDetectorService constructor.
     * @param TwelveConstellations $client
     * @param TwelveConstellationsRepo $repo
     */
    public function __construct(TwelveConstellations $client, TwelveConstellationsRepo $repo)
    {
        $this->client = $client;
        $this->repo = $repo;
    }

    /**
     * @return Collection|Models[]
     */
    public function mine(): Collection
    {
        $dto = collect($this->client->day());
        $result = [];
        $dto->each(function (TwelveConstellationsDTO $dto) use (&$result) {
            $day = Carbon::now()->day($dto->day())->month($dto->month());
            $result[] = $this->repo->createOrUpdate([
                'name' => $dto->name(),
                'day'  => $day,
            ], [
                'name'            => $dto->name(),
                'entire_score'    => $dto->entireScore(),
                'entire_content'  => $dto->entireContent(),
                'love_score'      => $dto->loveScore(),
                'love_content'    => $dto->loveContent(),
                'career_score'    => $dto->careerScore(),
                'career_content'  => $dto->careerContent(),
                'fortune_score'   => $dto->fortuneScore(),
                'fortune_content' => $dto->fortuneContent(),
                'day'             => $day,
            ]);
        });

        return Collection::make($result);
    }
}
