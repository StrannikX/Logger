<?php namespace Logger;

trait LoggerExtensions
{
    public function error(string $message)
    {
        $this->log(LogLevel::LEVEL_ERROR, $message);
    }

    public function debug(string $message)
    {
        $this->log(LogLevel::LEVEL_DEBUG, $message);
    }

    public function info(string $message)
    {
        $this->log(LogLevel::LEVEL_INFO, $message);
    }

    public function notice(string $message)
    {
        $this->log(LogLevel::LEVEL_NOTICE, $message);
    }
}