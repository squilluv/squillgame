<?php

return array(

    
	'game/([0-9]+)' => 'game/view/$1', 
    'game/addAjax/([0-9]+)' => 'game/addAjax/$1',
    'game/delAjax/([0-9]+)' => 'game/delAjax/$1',

	'news/([0-9]+)' => 'news/view/$1', 
	'news' => 'news/index', 

    'preorder' => 'preorder/index',

    'random' => 'random/index',

    'sale' => 'sale/index',

	'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1', 
    'catalog' => 'catalog/index',

    'wishlist' => 'like/index',
    'frequented' => 'frequented/index',

	'cart/checkout' => 'cart/checkout',
	'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
	'cart/add/([0-9]+)' => 'cart/add/$1',
	'cart/delete/([0-9]+)' => 'cart/delete/$1',
	'cart' => 'cart/index',

	'user/register' => 'user/register',
	'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'chatr/createchatline' => 'user/createchat',
    'chat' => 'user/chat',
    
    'user/([0-9]+)' => 'user/user/$1',
    'users' => 'user/userslist',
    
    'history/([0-9]+)' => 'cabinet/history/$1',
	'cabinet/edit' =>'cabinet/edit',
	'cabinet' => 'cabinet/index',

    'search/result' =>'search/result',
    'search' => 'search/index',

    'recomended/([0-9]+)/page-([0-9]+)' => 'recomended/view/$1/$2',
    'recomended/([0-9]+)' => 'recomended/view/$1',
    'recomended' => 'recomended/index',    

    'series/([0-9]+)/page-([0-9]+)' => 'series/view/$1/$2',
    'series/([0-9]+)' => 'series/view/$1',
    'series' => 'series/index',

    'teg/([0-9]+)/page-([0-9]+)' => 'teg/teg/$1/$2',
	'tegs' => 'teg/index',
	'teg/([0-9]+)' => 'teg/teg/$1',

    'admin/product/export' => 'adminProduct/exportexcel',
    'admin/product/exportdoc' => 'adminProduct/exportdoc',
	'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    'admin/user/create' => 'adminUser/create',
    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
    'admin/user' => 'adminUser/index',

    'admin/teg/create' => 'adminTeg/create',
    'admin/teg/update/([0-9]+)' => 'adminTeg/update/$1',
    'admin/teg/delete/([0-9]+)' => 'adminTeg/delete/$1',
    'admin/teg' => 'adminTeg/index',

    'admin/news/create' => 'adminNews/create',
    'admin/news/update/([0-9]+)' => 'adminNews/update/$1',
    'admin/news/delete/([0-9]+)' => 'adminNews/delete/$1',
    'admin/news' => 'adminNews/index',

    'admin/rec/create' => 'adminRecomended/create',
    'admin/rec/update/([0-9]+)' => 'adminRecomended/update/$1',
    'admin/rec/delete/([0-9]+)' => 'adminRecomended/delete/$1',
    'admin/rec' => 'adminRecomended/index',

    'admin/series/create' => 'adminSeries/create',
    'admin/series/update/([0-9]+)' => 'adminSeries/update/$1',
    'admin/series/delete/([0-9]+)' => 'adminSeries/delete/$1',
    'admin/series' => 'adminSeries/index',

    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin/order/export' => 'adminOrder/exportexcel',
    'admin/order/exportdoc' => 'adminOrder/exportdoc',
    'admin/order/view' => 'adminOrder/view',
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order' => 'adminOrder/index',

    'admin/contact/view' => 'adminContact/view',
    'admin/contact/delete/([0-9]+)' => 'adminContact/delete/$1',
    'admin/contact' => 'adminContact/index',

    'admin/message' => 'adminMessage/index',
    
	'admin' => 'admin/index',

	'contacts' => 'site/contact',

	'^/*$' => 'site/index',
    

);