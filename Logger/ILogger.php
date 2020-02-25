<?php namespace Logger;

interface ILogger
{
    function log(int $level, string $message);

    function setIsEnabled(bool $isEnabled);
    function getIsEnabled() : bool;
}