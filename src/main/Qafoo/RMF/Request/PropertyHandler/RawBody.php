<?php
/**
 * This file is part of the Qafoo RMF Component.
 *
 * @version $Revision$
 */

namespace Qafoo\RMF\Request\PropertyHandler;

use \Qafoo\RMF\Request\PropertyHandler;

/**
 * Property handler that returns the raw body of a request.
 *
 * @version $Revision$
 */
class RawBody extends PropertyHandler
{
    /**
     * Returns the raw request body.
     *
     * @return string
     */
    public function getValue()
    {
        return file_get_contents( 'php://input' );
    }
}
