<?php
namespace Deline\Service;

use Deline\Component\Container;

class DelineUploadService implements UploadService
{

    private $container;

    /**
     *
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     *
     * @param Container $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    

    public function getInfoOf($field)
    {
        if (!isset($_FILES[$field])) {
            return null;
        }
        $raw = $_FILES[$field];
        if (is_array($raw["name"])) {} else {
            return $raw;
        }
        return $info;
    }

    public function getInfoGroupOf($field)
    {
        $infos = array();
        if (!isset($_FILES[$field])) {
            return $infos;
        }
        $raw = $_FILES[$field];
        if (is_array($raw["name"])) {
            for ($i = 0; $i < count($raw["name"]); $i ++) {
                $info = array();
                $info["name"] = $raw["name"][$i];
                $info["size"] = $raw["size"][$i];
                $info["type"] = $raw["type"][$i];
                $info["tmp_name"] = $raw["tmp_name"][$i];
                array_push($infos, $info);
            }
        } else {
            array_push($infos, $raw);
        }
        return $infos;
    }
    private function moveUploadedFileByName($target, $dir) {
        if (is_uploaded_file($target)) {
            move_uploaded_file($target, $dir);
        }
    }

    public function moveUploadedFileGroupByField($field, $dir)
    {}

    public function moveUploadedFileByField($field, $dir)
    {}



}

