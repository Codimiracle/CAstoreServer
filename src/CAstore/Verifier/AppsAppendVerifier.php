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
        return array("");
    }

    public function getPattern($field)
    {
        // TODO: Implement getPattern() method.
    }

    public function getPassedMessage($field)
    {
        // TODO: Implement getPassedMessage() method.
    }

    public function getEmptyMessage($field)
    {
        // TODO: Implement getEmptyMessage() method.
    }

    public function getUnrecognizedMessage($field)
    {
        // TODO: Implement getUnrecognizedMessage() method.
    }
}