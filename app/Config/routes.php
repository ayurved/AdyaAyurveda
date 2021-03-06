<?php

	Router::connect('/', array('controller' => 'pages', 'action' => 'view'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/venues', array('controller' => 'pages', 'action' => 'venues'));
	Router::connect('/rebuild/permissions', array('controller' => 'acl', 'action' => 'aco_aro_sync'));
	Router::connect('/system-management/dashboard', array('controller' => 'pages', 'action' => 'dashboard', 'admin' => true));
	Router::connect('/test-1', array('controller' => 'tests', 'action' => 'index'));
	Router::connect('/cfeed', array('controller' => 'appointments', 'action' => 'calendar_feed', 'admin' => true));
	Router::connect('/cfeed/:start/:end', array('controller' => 'appointments', 'action' => 'calendar_feed', 'admin' => true));
	
	// Groups
	Router::connect('/system-management/groups', array('controller' => 'groups', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/groups/new', array('controller' => 'groups', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/groups/:group', array('controller' => 'groups', 'action' => 'view', 'admin' => true));
	Router::connect('/system-management/groups/:group/edit', array('controller' => 'groups', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/groups/:group/delete', array('controller' => 'groups', 'action' => 'delete', 'admin' => true));
	
	// Users
	Router::connect('/system-management/users', array('controller' => 'users', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/users/new', array('controller' => 'users', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/users/:user', array('controller' => 'users', 'action' => 'view', 'admin' => true));
	Router::connect('/system-management/users/:user/edit', array('controller' => 'users', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/users/:user/delete', array('controller' => 'users', 'action' => 'delete', 'admin' => true));
	Router::connect('/system-management/users/:userAttachment/delete-attachment', array('controller' => 'users', 'action' => 'delete_attachment', 'admin' => true));
	Router::connect('/system-management/users/:userNote/delete-note', array('controller' => 'users', 'action' => 'delete_user_note', 'admin' => true));
	
	// User Data Fields
	Router::connect('/system-management/user-data-fields', array('controller' => 'users', 'action' => 'data_field_index', 'admin' => true));
	Router::connect('/system-management/user-data-fields/new', array('controller' => 'users', 'action' => 'data_field_add', 'admin' => true));
	Router::connect('/system-management/user-data-fields/:userDataField/edit', array('controller' => 'users', 'action' => 'data_field_edit', 'admin' => true));
	Router::connect('/system-management/user-data-fields/:userDataField/delete', array('controller' => 'users', 'action' => 'data_field_delete', 'admin' => true));
	
	// Pages
	Router::connect('/content-management/pages', array('controller' => 'pages', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/pages/new', array('controller' => 'pages', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/pages/:page/new', array('controller' => 'pages', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/pages/:page', array('controller' => 'pages', 'action' => 'view', 'admin' => true));
	Router::connect('/content-management/pages/:page/edit', array('controller' => 'pages', 'action' => 'edit', 'admin' => true));
	Router::connect('/content-management/pages/:page/delete', array('controller' => 'pages', 'action' => 'delete', 'admin' => true));
	
	// KB
	Router::connect('/content-management/knowlege-base', array('controller' => 'knowledge_base_articles', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/knowlege-base/new', array('controller' => 'knowledge_base_articles', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/knowlege-base/:kbArticle', array('controller' => 'knowledge_base_articles', 'action' => 'view', 'admin' => true));
	Router::connect('/content-management/knowlege-base/:kbArticle/edit', array('controller' => 'knowledge_base_articles', 'action' => 'edit', 'admin' => true));
	Router::connect('/content-management/knowlege-base/:kbArticle/delete', array('controller' => 'knowledge_base_articles', 'action' => 'delete', 'admin' => true));
	
	// Blog Articles
	Router::connect('/blog', array('controller' => 'blog_articles', 'action' => 'index'));
	Router::connect('/blog/:ref/:title', array('controller' => 'blog_articles', 'action' => 'view'));
	Router::connect('/content-management/blog-articles', array('controller' => 'blog_articles', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/blog-articles/new', array('controller' => 'blog_articles', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/blog-articles/:blogArticle/edit', array('controller' => 'blog_articles', 'action' => 'edit', 'admin' => true));
	Router::connect('/content-management/blog-articles/:blogArticle/delete', array('controller' => 'blog_articles', 'action' => 'delete', 'admin' => true));
	
	// Modalities
	Router::connect('/content-management/modalities', array('controller' => 'modalities', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/modalities/new', array('controller' => 'modalities', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/modalities/:modality', array('controller' => 'modalities', 'action' => 'view', 'admin' => true));
	Router::connect('/content-management/modalities/:modality/edit', array('controller' => 'modalities', 'action' => 'edit', 'admin' => true));
	Router::connect('/content-management/modalities/:modality/delete', array('controller' => 'modalities', 'action' => 'delete', 'admin' => true));
	
	// Diseases
	Router::connect('/content-management/diseases', array('controller' => 'diseases', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/diseases/new', array('controller' => 'diseases', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/diseases/:disease', array('controller' => 'diseases', 'action' => 'view', 'admin' => true));
	Router::connect('/content-management/diseases/:disease/edit', array('controller' => 'diseases', 'action' => 'edit', 'admin' => true));
	Router::connect('/content-management/diseases/:disease/delete', array('controller' => 'diseases', 'action' => 'delete', 'admin' => true));
	
	// Products
	Router::connect('/system-management/products', array('controller' => 'products', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/products/new', array('controller' => 'products', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/products/:product', array('controller' => 'products', 'action' => 'view', 'admin' => true));
	Router::connect('/system-management/products/:product/edit', array('controller' => 'products', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/products/:product/delete', array('controller' => 'products', 'action' => 'delete', 'admin' => true));
	
	// Orders
	Router::connect('/system-management/orders', array('controller' => 'orders', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/orders/new', array('controller' => 'orders', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/orders/:order', array('controller' => 'orders', 'action' => 'view', 'admin' => true));
	Router::connect('/system-management/orders/:order/edit', array('controller' => 'orders', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/orders/:order/delete', array('controller' => 'orders', 'action' => 'delete', 'admin' => true));
	Router::connect('/system-management/orders/:order/create-invoice', array('controller' => 'orders', 'action' => 'create_invoice', 'admin' => true));
	
	// Invoices
	Router::connect('/system-management/invoices', array('controller' => 'invoices', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/invoices/new', array('controller' => 'invoices', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/invoices/:invoice', array('controller' => 'invoices', 'action' => 'view', 'admin' => true));
	Router::connect('/system-management/invoices/:invoice/edit', array('controller' => 'invoices', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/invoices/:invoice/delete', array('controller' => 'invoices', 'action' => 'delete', 'admin' => true));
	
	// Appointments
	Router::connect('/system-management/appointments', array('controller' => 'appointments', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/appointments/new', array('controller' => 'appointments', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/appointments/:booking/edit', array('controller' => 'appointments', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/appointments/:appointmentId/delete', array('controller' => 'appointments', 'action' => 'delete', 'admin' => true));
	Router::connect('/system-management/appointments/quick-view/:appointmentId', array('controller' => 'appointments', 'action' => 'quick_view', 'admin' => true));
	Router::connect('/system-management/appointments/send-reminder/:type/:appointmentId', array('controller' => 'appointments', 'action' => 'send_reminder', 'admin' => true));
	
	// Forums
	Router::connect('/forum', array('controller' => 'forums', 'action' => 'index'));
	Router::connect('/forum/:forumCategory/:forumTopic', array('controller' => 'forums', 'action' => 'view'));
	Router::connect('/forum/:forumCategory/:forumTopic/new', array('controller' => 'forums', 'action' => 'add_post'));
	Router::connect('/forum/:forumCategory/:forumTopic/:forumPost', array('controller' => 'forums', 'action' => 'view_post'));
	Router::connect('/forum/:forumCategory/:forumTopic/:forumPost/reply', array('controller' => 'forums', 'action' => 'add_post'));
	// Router::connect('/forum/:forumCategory/:forumTopic/*', array('controller' => 'forums', 'action' => 'topic_view'));
	Router::connect('/content-management/forums', array('controller' => 'forums', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/forums/new', array('controller' => 'forums', 'action' => 'category_add', 'admin' => true));
	Router::connect('/content-management/forums/:forumCategory', array('controller' => 'forums', 'action' => 'category_view', 'admin' => true));
	Router::connect('/content-management/forums/:forumCategory/edit', array('controller' => 'forums', 'action' => 'category_edit', 'admin' => true));
	Router::connect('/content-management/forums/:forumCategory/delete', array('controller' => 'forums', 'action' => 'category_delete', 'admin' => true));
	Router::connect('/content-management/forum-topics/new', array('controller' => 'forums', 'action' => 'topic_add', 'admin' => true));
	Router::connect('/content-management/forum-topics/:forumTopic', array('controller' => 'forums', 'action' => 'topic_view', 'admin' => true));
	Router::connect('/content-management/forum-topics/:forumTopic/edit', array('controller' => 'forums', 'action' => 'topic_edit', 'admin' => true));
	Router::connect('/content-management/forum-topics/:forumTopic/delete', array('controller' => 'forums', 'action' => 'topic_delete', 'admin' => true));
	
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/*', array('controller' => 'pages', 'action' => 'view'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
