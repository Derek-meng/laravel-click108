<?php

namespace Jubilee\Click108\Repositories;

use Jubilee\Click108\Entries\TwelveConstellations;
use Jubilee\Click108\Util\LaravelLoggerUtil;

class TwelveConstellationsRepo
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
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $constellations = null;
        }

        return $constellations;
    }
}
