<?php

namespace CAstore\Operation;

use Deline\Operation\EntityOperation;

interface AppOperation extends EntityOperation
{

    public function queryByKeyword($keyword);
}
