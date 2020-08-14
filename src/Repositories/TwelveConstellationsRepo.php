<?php

namespace Jubilee\Click108\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Jubilee\Click108\Contract\ITwelveConstellationsProvider;
use Jubilee\Click108\Entries\TwelveConstellations;
use Jubilee\Click108\Util\LaravelLoggerUtil;
use Throwable;

class TwelveConstellationsRepo implements ITwelveConstellationsProvider
{
    /**
     * @param array $attributes
     * @param array $values
     * @return TwelveConstellations|null
     */
    public function createOrUpdate(array $attributes, array $values = []): ?TwelveConstellations
    {
        try {
            /** @var  TwelveConstellations|null $constellations */
            $constellations = TwelveConstellations::updateOrCreate($attributes, $values);
        } catch (Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $constellations = null;
        }

        return $constellations;
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return Collection|TwelveConstellations[]
     */
    public function book(int $page, int $perPage): Collection
    {
        try {
            $constellations = TwelveConstellations::query()->forPage($page, $perPage)->orderByDesc('id')->get();
        } catch (Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $constellations = Collection::make();
        }

        return $constellations;
    }

    /**
     * @return int
     */
    public function total(): int
    {
        try {
            $count = TwelveConstellations::query()->count();
        } catch (Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $count = 0;
        }

        return $count;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        try {
            $constellation = TwelveConstellations::find($id);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $constellation = null;
        }

        return $constellation;
    }
}
