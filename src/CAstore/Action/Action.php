<?php

namespace CAstore\Action;

use CAstore\Component\ActionContainer;
use CAstore\Component\Mapper;
use CAstore\Component\SessionManager;
use CAstore\Template\Renderer;

/**
 * Class Action
 * 代表一个 抽象动作 。
 * 具体请点击<a href="docs\Structure.md">这里</a>
 * @package CAstore\Action
 */
abstract class Action
{
    /**
     * @var Context
     */
    protected $context;
    /**
     * @var Renderer
     */
    protected $renderer;

    private $mapper;

    /**
     * Action constructor.
     */
    public function __construct()
    {
        $this->mapper = new Mapper();
    }

    /**
     * @return Context
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param Context $context
     */
    public function setContext($context)
    {
        $this->context = $context;
        $this->renderer = $context->getRenderer();
    }

    public function attachAction($pattern, $method) {
        $this->mapper->map($pattern, $method);
    }

    /**
     * @param string $submit_id
     * @return bool
     */
    public function isSubmit($submit_id) {
        return isset($_POST[$submit_id]) && ($_POST[$submit_id] == $submit_id);
    }

    /**
     * @return string
     */
    private function getCurrentNodePathname()
    {
        global $logger;
        $pathname = strval($this->context->getNodePath()->getSubnodePath());
        $logger->addDebug("Action Method matching:".$pathname);
        return $pathname;
    }
    public function onActionHandle() {
        $method_name = $this->mapper->match($this->getCurrentNodePathname());
        if ($method_name) {
            $this->$method_name();
        } else {
            $this->onActionDefaultHandle();
        }
    }
    public function onActionDefaultHandle() {

    }
    public abstract function onActionStart();
    public abstract function onActionEnd();
}