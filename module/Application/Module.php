<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        //You need a copy of the service manager and it has to be set as a member for the lambda function to call it
        $sm = $e->getApplication()->getServiceManager();

        $zfcServiceEvents = $e->getApplication()->getServiceManager()->get('zfcuser_user_service')->getEventManager();

        $zfcServiceEvents->attach('register.post', function($e)use ($sm)  {

            /** @var \User\Entity\UserPdo $user */
            $user = $e->getParam('user');

            //This is the adapter that both bjyAuthorize and zfcuser use
            $adapter = $sm->get('zfcuser_zend_db_adapter');

            //Build the insert statement
            $sql = new \Zend\Db\Sql\Sql($adapter);

            //bjyAuthorize uses a magic constant for the table name
            $insert = new \Zend\Db\Sql\Insert('user_role_linker');
            $insert->columns(array('user_id', 'role_id'));
            $insert->values(array('user_id' => $user->getId(), 'role_id' => '1'), $insert::VALUES_MERGE);

            //Execute the insert statement
            $adapter->query($sql->getSqlStringForSqlObject($insert), $adapter::QUERY_MODE_EXECUTE);
        });
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'mapper_commentaires' => function ($sm) {

            $mapper = new Mapper\Commentaire();
            $mapper->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
            $entityClass = 'Application\Entity\Commentaire';
            $mapper->setEntityPrototype(new $entityClass);
            //$mapper->setHydrator(new Mapper\CommentHydrator());
            $mapper->setTableName('commentaires');
            return $mapper;
        },
                    'zfcuser_user_mapper' => function ($sm) {
                    $options = $sm->get('zfcuser_module_options');
                    $mapper = new Mapper\User();
                    $mapper->setDbAdapter($sm->get('zfcuser_zend_db_adapter'));
                    $entityClass = $options->getUserEntityClass();
                    $mapper->setEntityPrototype(new $entityClass);
                    $mapper->setHydrator(new Mapper\UserHydrator());
                    $mapper->setTableName($options->getTableName());
                    return $mapper;
                },
            ),
            'invokables' => array(
        ));
    }

}
