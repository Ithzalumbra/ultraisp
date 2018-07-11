<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 08/07/2018
 * Time: 15:43
 */
// In src/Error/AppExceptionRenderer.php
namespace App\Error;

use Cake\Error\ExceptionRenderer;

class AppExceptionRenderer extends ExceptionRenderer
{
    public function notFound($error)
    {
        // Do something with NotFoundException objects.
        $response = $this->controller->response;

        return $response->withStringBody('Oops that widget is missing.');
    }
}