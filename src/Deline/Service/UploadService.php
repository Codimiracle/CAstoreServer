<?php
namespace Deline\Service;

interface UploadService extends Service
{

    public function moveUploadedFileByInfo($info, $dir);
    public function moveUploadedFileByField($field, $dir);
    public function delete($destination);
    public function getInfo($field);
    public function getInfoGroup($field);
    
}

