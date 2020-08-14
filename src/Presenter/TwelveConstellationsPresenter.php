<?php

namespace Jubilee\Click108\Presenter;

use Independent\Kit\Support\Scalar\StringMaster;

class TwelveConstellationsPresenter
{
    /**
     * @param int $score
     * @return string
     */
    public function mapToStart(int $score): string
    {
        $result = null;
        for ($i = 0; $i <= $score; $i++) {
            $result = is_null($result) ? '★' : $result . '★';
        }

        return $result;
    }

    /**
     * @param string $content
     * @return string
     */
    public function subContent(string $content): string
    {
        return StringMaster::substr($content, 0, 20) . '....';
    }
}
