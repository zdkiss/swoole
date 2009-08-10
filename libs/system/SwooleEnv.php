<?php
class SwooleEnv implements ArrayAccess
{
	static $default_cache_life = 600;
	var $cache_prefix = 'swoole_env_';
	var $swoole;
	
	function __construct($swoole)
	{
		$this->swoole = $swoole;
	}
	function offsetGet($key)
	{
		return $this->swoole->cache->get($this->cache_prefix.$key);
	}
	function offsetSet($key,$value)
	{
		$this->swoole->cache->set($this->cache_prefix.$key,$value,self::$default_cache_life);
	}
	function offsetExists($key)
	{
		$v = $this->offsetGet($key);
		if(is_numeric($v)) return true;
		else return false;
	}
	function offsetUnset($key)
	{
		$this->swoole->cache->delete($this->cache_prefix.$key);
	}
	function __toString()
	{
		return "This is a memory Object!";
	}
}
?>