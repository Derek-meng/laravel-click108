<?php

namespace Jubilee\Click108\Contract;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ITwelveConstellationsProvider
{
    /**
     * @param int $page
     * @param int $perPage
     * @return Collection|Model[]
     */
    public function book(int $page, int $perPage): Collection;

    /**
     * @return int
     */
    public function total(): int;

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;
}
