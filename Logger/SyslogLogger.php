<?php namespace Logger;

class SyslogLogger extends BaseLogger
{
    public function __construct(array $params)
    {
        parent::__construct($params);
    }
    
    // Realization of abstract method BaseLogger::_logMessage(int, string)
    protected function _logMessage(int $level, string $message)
    {
        $priority = $this->_logLevelToSyslogPriority($level);
        syslog($priority, $message);
    }

    private function _logLevelToSyslogPriority(int $level) : int
    {
        switch($level)
        {
            case LogLevel::LEVEL_ERROR:
                return LOG_ERR;

            case LogLevel::LEVEL_DEBUG:
                return LOG_DEBUG;

            case LogLevel::LEVEL_INFO:
                return LOG_INFO;

            case LogLevel::LEVEL_NOTICE:
                return LOG_NOTICE;

            default:
                throw new \InvalidArgumentException("Unknown log level: " . $level);
        }
    }
}