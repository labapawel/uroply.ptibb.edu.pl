<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fas fa-tachometer-alt',
        'url'   => route('admin.dashboard'),
    ],

    // [
    //     'title' => 'Information',
    //     'icon'  => 'fas fa-info-circle',
    //     'url'   => route('admin.information'),
    // ],

    // Add this to your existing navigation items
    // [
    //     'title' => 'Users',
    //     'icon' => 'fa fa-users',
    //     'priority' => 100,
    //     'model' => \App\Models\User::class,
    //     'accessLogic' => function (Page $page) {
    //         return true;
    //     },
    // ],

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    (new Page(\App\Models\Holiday::class))
    // ->setPriority(1)
    ->setIcon('fas fa-calendar-alt')
    ->setAccessLogic(function (Page $page) {
        return auth()->user()->isUser();
    }),

     [
        'title' => 'Ustawienia',
        'icon'  => 'fas fa-cogs',
        'pages' => [
           (new Page(\App\Models\User::class))
               ->setPriority(100)
               ->setIcon('fas fa-users')
               ->setAccessLogic(function (Page $page) {
                   return true;
               }),
           (new Page(\App\Models\daysOff::class))
               ->setPriority(101)
               ->setIcon('fas fa-calendar-alt')
               ->setAccessLogic(function (Page $page) {
                   return auth()->user()->isAdmin();
               }),
           (new Page(\App\Models\HolidayType::class))
               ->setPriority(102)
               ->setIcon('fas fa-calendar-alt')
               ->setAccessLogic(function (Page $page) {
                   return auth()->user()->isSuperAdmin();
               }),
        ]
    ],
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];
