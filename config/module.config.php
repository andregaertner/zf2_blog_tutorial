<?php
/**
 My Routes
 http://zf2_cms.localhost/blog 		    // übersicht
 http://zf2_cms.localhost/blog/add      // eintrag erstellen
 http://zf2_cms.localhost/blog/1        // detail eintrag aufrufen
 http://zf2_cms.localhost/blog/delete/1 // eintrag löschen
 */
 
return array(
	/** Controller Configuration */
	'controllers' => array(
		'factories' => array(
			'Blog\Controller\List'   => 'Blog\Factory\ListControllerFactory',
			'Blog\Controller\Write'  => 'Blog\Factory\WriteControllerFactory',
            'Blog\Controller\Delete' => 'Blog\Factory\DeleteControllerFactory'
		),
	),
	
	/** Route Configuration */
	'router' => array(
		'routes' => array(
			'blog' => array(
			#'post' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/blog',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\List',
                        'action'     => 'index',
                    )
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'detail' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/:id',
                            'defaults' => array(
                                'action' => 'detail'
                            ),
                            'constraints' => array(
                                'id' => '\d+'
								#'id' => '[1-9]\d*'
                            )
                        )
                    ),
                    'add' => array(
                        'type' => 'literal', # literal gibt die genaue Route an
                        'options' => array(
                            'route'    => '/add',
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Write',
                                'action'     => 'add'
                            )
                        )
                    ),
                    'edit' => array(
                        'type' => 'segment', # segment gibt die variable Route an
                        'options' => array(
                            'route'    => '/edit/:id',
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Write',
                                'action'     => 'edit'
                            ),
                            'constraints' => array(
                                'id' => '\d+'
                            )
                        )
                    ),
					'delete' => array(
                        'type' => 'segment', # segment gibt die variable Route an
                        'options' => array(
                            'route'    => '/delete/:id',
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Delete',
                                'action'     => 'delete'
                            ),
                            'constraints' => array(
                                'id' => '\d+'
                            )
                        )
                    ),
                )
            )
        )
    ),
	
	'navigation' => array(
        'default' => array(
            array(
                'label' => 'Blog',
                'route' => 'blog',
            ),
        ),
    ),
	
	/** View Manager Config */
	'view_manager' => array(
         'template_path_stack' => array(
             __DIR__ . '/../view',
         ),
     ),
	 
	/** Services Configuration */
	'service_manager' => array(
		'invokables' => array(
			// 'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
		),
		'factories' => array(
			'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
			'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
			'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory'
        )
	),
	
	/*
	# config für eine eigene Datenbank in diesem Modul
	'db' => array(
		'driver'         => 'Pdo',
		'username'       => 'root',  //edit this
		'password'       => '',  //edit this
		'dsn'            => 'mysql:dbname=zf2_cms;host=localhost',
		'driver_options' => array(
			\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
		)
	),
	*/
);