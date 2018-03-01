<?php
namespace Deline\Service;

interface UploadService extends Service
{
    const APPLICATION_ROOT = "";
    public function moveUploadedFile($field, $dir);
    public function getInfoOf($field);
    public function getInfoGroupOf($field);
    
}

