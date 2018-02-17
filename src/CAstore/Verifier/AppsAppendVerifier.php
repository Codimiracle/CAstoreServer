<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-2-12
 * Time: 下午5:20
 */

namespace CAstore\Verifier;


class AppsAppendVerifier extends AbstractVerifier
{

    /**
     * @return array
     */
    public function getFields()
    {
        return array("name", "title", "package", "description", "platform", "developer");
    }

    public function getPattern($field)
    {
        
    }

    public function getPassedMessage($field)
    {
        
    }

    public function getEmptyMessage($field)
    {
        
    }

    public function getUnrecognizedMessage($field)
    {
        
    }
}
