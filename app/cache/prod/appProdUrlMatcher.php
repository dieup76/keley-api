<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/groups')) {
            // groups_index
            if (rtrim($pathinfo, '/') === '/groups') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'groups_index');
                }

                return array (  '_controller' => 'Dieup\\UsersBundle\\Controller\\GroupsController::indexAction',  '_route' => 'groups_index',);
            }

            // groups_view
            if (preg_match('#^/groups/(?P<id>\\d)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'groups_view');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'groups_view')), array (  '_controller' => 'Dieup\\UsersBundle\\Controller\\GroupsController::viewAction',));
            }

        }

        if (0 === strpos($pathinfo, '/users')) {
            // users_index
            if (rtrim($pathinfo, '/') === '/users') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'users_index');
                }

                return array (  '_controller' => 'Dieup\\UsersBundle\\Controller\\UsersController::indexAction',  '_route' => 'users_index',);
            }

            // users_view
            if (preg_match('#^/users/(?P<id>\\d)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'users_view');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_view')), array (  '_controller' => 'Dieup\\UsersBundle\\Controller\\UsersController::viewAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
