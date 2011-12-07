<?php
/**
 * This file is part of the qafoo RMF component.
 *
 * @version $Revision$
 */

namespace Qafoo\RMF\Request;

/**
 * Property handler base class
 *
 * @version $Revision$
 */
abstract class PropertyHandler
{
    /**
     * Get value of property handler
     * 
     * @return mixed
     */
    abstract public function getValue();
}

