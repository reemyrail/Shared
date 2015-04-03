<?php

return array(
    'bjyauthorize' => array(
// set the 'guest' role as default (must be defined in a role provider)
        'default_role' => 'guest',
        /* If you only have a default role and an authenticated role, you can
         * use the 'AuthenticationIdentityProvider' to allow/restrict access
         * with the guards based on the state 'logged in' and 'not logged in'.
         *
         * 'default_role'       => 'guest',         // not authenticated
         * 'authenticated_role' => 'user',          // authenticated
         * 'identity_provider'  => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
         */
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
        //'unauthorized_strategy' => 'BjyAuthorize\View\RedirectionStrategy',
        /* role providers simply provide a list of roles that should be inserted
         * into the Zend\Acl instance. the module comes with two providers, one
         * to specify roles in a config file and one to load roles using a
         * Zend\Db adapter.
         */
        'role_providers' => array(
            /* here, 'guest' and 'user are defined as top-level roles, with
             * 'admin' inheriting from user
             */
            'BjyAuthorize\Provider\Role\Config' => array(
                'guest' => array(),
                'user' => array('children' => array(
                        'admin' => array(),
                    )),
                // using an object repository (entity repository) to load all roles into our ACL
                'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                    'object_manager' => 'doctrine.entity_manager.orm_default',
                    'role_entity_class' => 'Application\Entity\Role',
                ),
            ),
        ),
        // resource providers provide a list of resources that will be tracked
// in the ACL. like roles, they can be hierarchical
        'resource_providers' => array(
            'BjyAuthorize\Provider\Resource\Config' => array(
                'pants' => array(),
            ),
        ),
        /* rules can be specified here with the format:
         * array(roles (array), resource, [privilege (array|string), assertion])
         * assertions will be loaded using the service manager and must implement
         * Zend\Acl\Assertion\AssertionInterface.
         * *if you use assertions, define them using the service manager!*
         */
        'rule_providers' => array(
            'BjyAuthorize\Provider\Rule\Config' => array(
                'allow' => array(
// allow guests and users (and admins, through inheritance)
// the "wear" privilege on the resource "pants"
                ),
                // Don't mix allow/deny rules if you are using role inheritance.
// There are some weird bugs.
                'deny' => array(
// array(array('guest', 'user'), 'admin', 'admin')
                ),
            ),
        ),
        /* Currently, only controller and route guards exist
         *
         * Consider enabling either the controller or the route guard depending on your needs.
         */
        'guards' => array(
            /* If this guard is specified here (i.e. it is enabled), it will block
             * access to all controllers and actions unless they are specified here.
             * You may omit the 'action' index to allow access to the entire controller
             */
            'BjyAuthorize\Guard\Controller' => array(
                array('controller' => 'Application\Controller\Index', 'action' => array('index', 'cartes', 'memoire', 'publicitaire', 'papeterie', 'tirage', 'affichage', 'mariage'), 'roles' => array('guest', 'user')),
                array('controller' => 'ScnSocialAuth-User', 'action' => 'login', 'roles' => array('guest', 'user')),
                array('controller' => 'Admin\Controller\PapierRest', 'action' => 'getList', 'roles' => array('admin')),
                // You can also specify an array of actions or an array of controllers (or both)
// allow "guest" and "admin" to access actions "list" and "manage" on these "index",
// "static" and "console" controllers
                array(
                    'controller' => array('index', 'static', 'console'),
                    'action' => array('list', 'manage'),
                    'roles' => array('guest', 'admin')
                ),
                array(
                    'controller' => array('cdlitwostagesignup_ev_controller'),
                    'roles' => array('guest', 'user')
                ),
                array(
                    'controller' => array('UserEditController'),
                    'roles' => array('user')
                ),
                array(
                    'controller' => array('Admin\Controller\PapierRest', 'BackofficeModeleRest'),
                    'roles' => array('admin')
                ),
                array(
                    'controller' => array('ScnSocialAuth-User', 'ScnSocialAuth-HybridAuth'),
                    'roles' => array('user', 'guest')
                ),
                array('controller' => 'zfcuser', 'roles' => array()),
            // Below is the default index action used by the ZendSkeletonApplication
// array('controller' => 'Application\Controller\Index', 'roles' => array('guest', 'user')),
            ),
            /* If this guard is specified here (i.e. it is enabled), it will block
             * access to all routes unless they are specified here.
             */
            'BjyAuthorize\Guard\Route' => array(
                array('route' => 'scn-social-auth-user', 'roles' => array('guest', 'user')),
                array('route' => 'scn-social-auth-user/login', 'roles' => array('guest', 'user')),
                array('route' => 'scn-social-auth-user/login/provider', 'roles' => array('guest', 'user')),
                array('route' => 'scn-social-auth-user/register', 'roles' => array('guest', 'user')),
                array('route' => 'scn-social-auth-user/authenticate/provider', 'roles' => array('guest', 'user')),
                array('route' => 'scn-social-auth-user/logout', 'roles' => array('guest', 'user')),
                array('route' => 'scn-social-auth-hauth', 'roles' => array('guest', 'user')),
                array('route' => '/', 'roles' => array('guest')),
                array('route' => 'zfcuser/changepassword', 'roles' => array('user')),
                array('route' => 'papier', 'roles' => array('admin')),
                array('route' => 'zfcuser', 'roles' => array('user')),
                array('route' => 'zfcuser/logout', 'roles' => array('user')),
                array('route' => 'zfcuser/login', 'roles' => array('guest')),
                array('route' => 'zfcuser/register', 'roles' => array('guest')),
                array('route' => 'register', 'roles' => array('guest')),
                array('route' => 'zfcuser/register/step1', 'roles' => array('guest')),
                array('route' => 'zfcuser/register/step2', 'roles' => array('guest')),
// Below is the default index action used by the ZendSkeletonApplication
                array('route' => 'home', 'roles' => array('guest', 'user')),
                array('route' => 'registercdli', 'roles' => array('guest', 'user')),
                array('route' => 'registercdli/step1', 'roles' => array('guest', 'user')),
                array('route' => 'registercdli/step2', 'roles' => array('guest', 'user'))
            ),
        ),
    ),
);
