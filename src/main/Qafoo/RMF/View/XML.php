<?php
/**
 * This file is part of the qafoo RMF component.
 *
 * @version $Revision$
 * @copyright Copyright (c) 2011 Qafoo GmbH
 * @license Dual licensed under the MIT and GPL licenses.
 */

namespace Qafoo\RMF\View;
use Qafoo\RMF\Request;
use Qafoo\RMF\View;

/**
 * View base class
 *
 * The view receives the ``Request`` and the return value from the controller
 * (which might be ``null``). The view will then display this result.
 *
 * @version $Revision$
 */
class XML extends View
{
    /**
     * Mapping of HTTP status codes to error names
     *
     * @var array
     */
    protected $errors = array(
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        409 => 'Conflict',
        500 => 'Internal Server Error',
    );

    /**
     * Display the controller result
     *
     * @param Request $request
     * @param mixed $result
     * @return void
     */
    public function display( Request $request, $result )
    {
        header( 'Content-Type: text/xml' );
        if ( !$result instanceof \Exception )
        {
            echo $result;
            return;
        }

        switch ( true )
        {
            case $result instanceof \Qafoo\RMF\BadRequest:
                $type = 400;
                break;

            case $result instanceof \Qafoo\RMF\NotFound:
                $type = 404;
                break;

            case $result instanceof \Qafoo\RMF\Conflict:
                $type = 409;
                break;

            default:
                $type = 500;
        }

        header( "Status: $type " . $this->errors[$type] );
        echo <<<EOXML
<?xml version="1.0" ?>
<error>
    <name>{$this->errors[$type]}</name>
    <type>{$type}</type>
    <message>{$result->getMessage()}</message>
</error>
EOXML;
    }
}
