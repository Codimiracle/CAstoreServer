<?php
namespace CAstore\Model\DAO;

use Deline\Model\DAO\Pager;

class SimplePager implements Pager
{
    const LIMIT_CAUSE = " LIMIT ?,?";

    private $offset;

    private $length;

    public function getOffset()
    {
        return $this->offset;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getTranformSQL($sentence)
    {
        return $sentence . self::LIMIT_CAUSE;
    }
}