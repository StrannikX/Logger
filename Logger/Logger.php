<?php namespace Logger;

class Logger implements ILogger {

    use LoggerExtensions;

    private $_isEnabled = true;
    private $_nestedLoggers = [];

    public function log(int $level, string $message)
    {
        if (!$this->_isEnabled) return;
        foreach ($this->_nestedLoggers as $logger) {
            $logger->log($level, $message);
        }
    }

    public function addLogger(ILogger $logger)
    {
        $this->_nestedLoggers[] = $logger;
    }

    public function setIsEnabled(bool $isEnabled)
    {
        $this->_isEnabled = $isEnabled;
    }

    public function getIsEnabled() : bool
    {
        return $this->_isEnabled;
    }

}