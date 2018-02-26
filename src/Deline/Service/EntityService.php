<?php
namespace Deline\Service;

interface EntityService extends Service
{

    public function append($entity);

    public function delete($entity);

    public function edit($entity);

    public function queryById($id);
}
