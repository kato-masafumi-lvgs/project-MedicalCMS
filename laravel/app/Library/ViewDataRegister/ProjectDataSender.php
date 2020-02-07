<?php

namespace App\Library\ViewDataRegister;

use Illuminate\Contracts\Config\Repository;
use Lvgs\Laravel\BaseController\ViewDataRegister\DataSender\DataSender;

class ProjectDataSender implements DataSender
{
    private $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function sendData()
    {
        return $this->config->get('project');
    }

}
