<?php
/**
 * This file is part of the Qafoo RMF component.
 *
 * @version $Revision$
 */

namespace Qafoo\RMF;

spl_autoload_register(
    function ( $class )
    {
        if ( 0 === strpos( $class, __NAMESPACE__ ) )
        {
            include __DIR__ . '/../../' . strtr( $class, '\\', '/' ) . '.php';
        }
        else
        {
            include __DIR__ . '/../../../library/' . strtr( $class, '\\_', '/' ) . '.php';
        }
    }
);
