<?php

namespace Jubilee\Click108\Util;

use Jubilee\Click108\Constants\MonologLevelLabelConstants;

class LaravelLoggerUtil
{
    /**
     * @param \Throwable $e
     * @param string $level ref Jubilee\Click108\Constants\MonologLevelLabelConstants const to know all level,
     * default is debug level.
     * @see MonologLevelLabelConstants
     */
    public static function loggerException(\Throwable $e, string $level = 'debug')
    {
        $message = [
            'msg'   => $e->getMessage(),
            'line'  => $e->getLine(),
            'file'  => $e->getFile(),
            'trace' => $e->getTraceAsString()
        ];
        self::loggerMessage(json_encode($message), $level);
    }

    /**
     * @param string $message
     * @param string $level ref Jubilee\Click108\Constants\MonologLevelLabelConstants const to know all level
     * , default is debug level.
     */
    public static function loggerMessage(string $message, string $level = 'debug')
    {
        \Log::log($level, $message);
    }
}
