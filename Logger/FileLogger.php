<?php namespace Logger;

class FileLogger extends BaseLogger
{
    private $_fileName;

    public function __construct(array $params)
    {
        parent::__construct($params);
        if (!isset($params['filename']))
        {
            throw new \InvalidArgumentException("Filename must be specified!");
        }

        $this->_fileName = $params['filename'];
    }
    
    // Realization of abstract method BaseLogger::_logMessage(int, string)
    protected function _logMessage(int $level, string $message)
    {
        file_put_contents($this->_fileName, $message, FILE_APPEND | LOCK_EX);
    }
}