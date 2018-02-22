<?php
namespace Deline\Component;

class DelineSession implements Session
{
    public function __construct()
    {
        if (session_id() == "") {
            session_start();
        }
    }

    public function setParameter($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getParameter($key)
    {
        return $_SESSION[$key];
    }
    
    public function destroy() {
        session_destroy();
    }

}

