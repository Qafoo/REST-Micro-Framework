<?php
/**
 * This file is part of the qafoo RMF component.
 *
 * @version $Revision$
 */

namespace Qafoo\RMF\Dispatcher;
use Qafoo\RMF\Dispatcher;
use Qafoo\RMF\Request;

/**
 * Dispatcher base class
 *
 * The dispatcher controls the application flow and is configured by the
 * ``Router`` and the ``View`` implementation. It then dispatches the 
 * ``Request``.
 *
 * @version $Revision$
 */
class Simple extends Dispatcher
{
    /**
     * Dispatch the request
     *
     * Dispatches the request using the information from the router and paasing 
     * the result to the view.
     * 
     * @param Request $request 
     * @return void
     */
    public function dispatch( Request $request )
    {
        try {
            $callback = $this->router->getRoutingInformation( $request );

            $this->view->display(
                $request,
                call_user_func( $callback, $request )
            );
        }
        catch ( \Exception $e )
        {
            $this->view->display( $request, $e );
        }
    }
}

