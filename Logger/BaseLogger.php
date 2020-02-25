<?php namespace Logger;

abstract class BaseLogger implements ILogger
{
    use LoggerExtensions;

    private $_isEnabled = true;
    private $_levels = 0;
    private $_formatter;

    public function __construct(array $params)
    {
        $this->_formatter = new MessageFormatter();
        
        if (isset($params['is_enabled']))
        {
            $isEnabled = $params['is_enabled'];
            if (!is_bool($isEnabled))
            {
                throw new \InvalidArgumentException("\"is_enabled\" param should has boolean type!");
            }
        }

        if (isset($params['levels']))
        {
            $levels = 0;
            foreach ($params['levels'] as $level) 
            {
                $levels = $levels | $level;
            }
            $this->_levels = $levels;
        } else {
            $this->_levels = LogLevel::LEVEL_INFO | LogLevel::LEVEL_NOTICE 
                           | LogLevel::LEVEL_DEBUG | LogLevel::LEVEL_ERROR;
        }
    }
    
    public function log(int $level, string $message)
    {
        if (!$this->_isEnabled || ($this->_levels & $level) === 0)
            return;
        $this->_logMessage($level, $this->_formatter->format($level, $message));
    }

    protected abstract function _logMessage(int $level, string $message);

    public function setIsEnabled(bool $isEnabled)
    {
        $this->_isEnabled = $isEnabled;
    }
    
    public function getIsEnabled() : bool
    {
        return $this->_isEnabled;
    }
}