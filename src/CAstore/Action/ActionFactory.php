<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-1-17
 * Time: 下午8:58
 */

namespace CAstore\Action;

class ActionFactory
{
    private static $actions = array(
        "Home" => HomeAction::class,
        "User" => UserAction::class,
        "Apps" => AppsAction::class,
        "About" => AboutAction::class,
        "System" => SystemAction::class
    );

    /**
     * @param $name
     * @param $context
     * @return AbstractAction
     */
    public static function getAction($context, $name) {
        if (isset(self::$actions[$name])) {
            $action_class = self::$actions[$name];
            $action = new $action_class;
            /** @var AbstractAction $action */
            $action->setContainer($context);
            return $action;
        } else {
            return null;
        }
    }
}
