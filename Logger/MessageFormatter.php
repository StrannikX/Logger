<?php namespace Logger;

class MessageFormatter
{
    public function format(int $level, string $message)
    {
        $levelName = LogLevel::getLevelName($level);
        $levelCode = LogLevel::getLevelCode($level);
        $time = (new \DateTime())
            ->format(\DateTime::ATOM);
        return sprintf("%s %s %s %s\n", $time, $levelCode, $levelName, $message);
    }
}