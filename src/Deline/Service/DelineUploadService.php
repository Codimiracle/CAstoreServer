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

    public function getInfo($field)
    {
        if (! isset($_FILES[$field])) {
            return null;
        }
        $raw = $_FILES[$field];
        if (! is_array($raw["name"]) && $raw["error"] == 0) {
            return $raw;
        }
        return null;
    }

    public function getInfoGroup($field)
    {
        $infos = array();
        if (! isset($_FILES[$field])) {
            return $infos;
        }
        $raw = $_FILES[$field];
        if (is_array($raw["name"])) {
            for ($i = 0; $i < count($raw["name"]); $i ++) {
                if ($raw["error"][$i] != 0) {
                    continue;
                }
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

    public function getFileExtension($filename)
    {
        list ($name, $extension) = explode(".", $filename);
        if ($extension) {
            return $extension;
        } else {
            return "";
        }
    }

    public function getUploadedFileExtension($field)
    {
        if (! is_array($_FILES[$field]["name"])) {
            return $this->getFileExtension($_FILES[$field]["name"]);
        } else {
            return "";
        }
    }

    public function delete($destination)
    {
        if (file_exists($destination)) {
            unlink($destination);
        }
    }

    /**
     * 获取安全文件名称
     *
     * @param string $extension
     * @return string
     */
    public function getSecurityFileName($extension)
    {
        return hash("md5", time() . rand() . rand()) . "." . $extension;
    }

    public function moveUploadedFileByInfo($info, $dir)
    {
        if ($info) {
            $target = $info["tmp_name"];
            $extension = $this->getFileExtension($info["name"]);
            $filename = $this->getSecurityFileName($extension);
            $destination = $dir . "/" . $filename;
            return move_uploaded_file($target, $destination) ? $filename : false;
        }
        return false;
    }

    public function moveUploadedFileByField($field, $dir)
    {
        $info = $this->getInfo($field);
        return $this->moveUploadedFileByInfo($info, $dir);
    }
}

