<?php
namespace Deline\Component;

interface Session
{
    /**
     * 设置会话参数
     *
     * @param string $key
     * @param mixed $value
     */
    public function setParameter($key, $value);
    
    /**
     * 获取会话参数
     *
     * @param
     *            $key
     * @return mixed|null
     */
    public function getParameter($key);
}

