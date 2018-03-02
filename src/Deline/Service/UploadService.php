<?php
namespace Deline\Service;

interface UploadService extends Service
{
    public function moveUploadedFileByField($field, $dir);
    public function moveUploadedFileGroupByField($field, $dir);
    public function getInfoOf($field);
    public function getInfoGroupOf($field);
    
}

