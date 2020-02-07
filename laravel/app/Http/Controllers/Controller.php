<?php
namespace App\Http\Controllers;

use Lvgs\Laravel\BaseController\Routing\WebController;

/**
 * Class Controller
 *
 * Sampleファイル
 *
 * @package App\Http\Controllers
 */
class Controller extends WebController
{
    public function main()
    {
        return $this->render();
    }
}
