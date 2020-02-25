<?php namespace Logger;

class LogLevel {
    
    public const LEVEL_ERROR  = 1;
    public const LEVEL_INFO   = 2;
    public const LEVEL_DEBUG  = 4;
    public const LEVEL_NOTICE = 8;

    public static function getLevelCode(int $level) : string
    {
        switch($level)
        {
            case LogLevel::LEVEL_ERROR:
                return '001';

            case LogLevel::LEVEL_INFO:
                return '002';

            case LogLevel::LEVEL_DEBUG:
                return '003';

            case LogLevel::LEVEL_NOTICE:
                return '004';

            default:
                throw new \InvalidArgumentException("Unknown log level: " . $level);
        }
    }

    public static function getLevelName(int $level) : string
    {
        switch($level)
        {
            case LogLevel::LEVEL_ERROR:
                return 'ERROR';

            case LogLevel::LEVEL_INFO:
                return 'INFO';

            case LogLevel::LEVEL_DEBUG:
                return 'DEBUG';

            case LogLevel::LEVEL_NOTICE:
                return 'NOTICE';

            default:
                throw new \InvalidArgumentException("Unknown log level: " . $level);
        }
    }
}