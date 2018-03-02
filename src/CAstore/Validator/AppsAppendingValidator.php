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
            "package",
            "description",
            "platform",
            "developer"
        );
    }

    public function getPattern($field)
    {
        switch ($field) {
            case "name":
                return "";
            case "title":
                return "";
            case "package":
                return "";
            case "description":
                return "";
            case "platform":
                return "";
            case "developer":
                return "";
        }
    }

    public function getPassedMessage($field)
    {
        return "";
    }

    public function getEmptyMessage($field)
    {
        return "";
    }

    public function getUnrecognizedMessage($field)
    {
        return "";
    }
}