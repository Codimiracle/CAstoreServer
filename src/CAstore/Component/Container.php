<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-1-18
 * Time: 下午8:25
 */

namespace CAstore\Component;

use CAstore\Action\Context;

interface Container extends Context
{
    /**
     * URL 重定向
     * @param string $node_path
     */
    public function redirect($node_path);

    /**
     * 请求分发
     * @param NodePath $node_path
     */
    public function dispatch($node_path);
    /**
     * 初始化容器
     */
    public function init();

    /**
     * 引发容器任务
     */
    public function invoke();

    /**
     * 销毁容器
     */
    public function destroy();
}