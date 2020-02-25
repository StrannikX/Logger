<?php namespace Logger;

class FakeLogger extends BaseLogger
{
    public function __construct()
    {
        parent::__construct([]);
    }

    // Realization of abstract method BaseLogger::_logMessage(int, string)
    protected function _logMessage(int $level, string $message)
    {
        // Do nothing
    }
}