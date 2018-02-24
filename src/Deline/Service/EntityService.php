<?php
namespace Deline\Service;

interface EntityService extends Service
{

    public function setTarget($entity);

    public function getTarget();

    public function append();

    public function delete();

    public function edit();

    public function queryById($id);
}
