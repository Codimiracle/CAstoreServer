<?php
namespace CAstore\Validator;

use Deline\Validator\AbstractValidator;

class AppsAppendingValidator extends AbstractValidator
{

    /**
     *
     * @return array
     */
    public function getFields()
    {
        return array(
            "name",
            "title",
            "version",
            "package",
            "platform",
            "developer"
        );
    }

    public function getPattern($field)
    {
        switch ($field) {
            case "name":
                return "/.{1,128}/";
            case "title":
                return "/.{1,255}/";
            case "version":
                return "/^[0-9]+(\.[0-9]+)*$/";
            case "package":
                return "/^[a-z]+(\.[a-z]+)*$/";
            case "platform":
                return "/^.{1,128}$/";
            case "developer":
                return "/^.{1,128}$/";
        }
    }

    public function getPassedMessage($field)
    {
        return $field."验证通过";
    }

    public function getEmptyMessage($field)
    {
        return $field." 不能为空！";
    }

    public function getUnrecognizedMessage($field)
    {
        return $field." 的数据格式不正确！";
    }
}
