<?php
namespace Deline\Service;

use Deline\Component\Container;

class DelineUploadService implements UploadService
{
    private $container;
    /**
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param Container $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

}

