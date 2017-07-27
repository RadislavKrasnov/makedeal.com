<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminSection;
use PackageManager;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Navigation\Page;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\User::class => 'App\Http\Sections\Users',
        \App\Project::class => 'App\Http\Sections\Projects',
        \App\Technology::class => 'App\Http\Sections\Technologies',
        \App\Job::class => 'App\Http\Sections\Jobs',
        \App\Company::class => 'App\Http\Sections\Companies',
        \App\Contact::class => 'App\Http\Sections\Contacts',
        \App\Photo::class => 'App\Http\Sections\Photos',
        \App\Comment::class => 'App\Http\Sections\Comments',
        \App\Admin::class => 'App\Http\Sections\Admins'
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {

        parent::boot($admin);

        $this->registerNRoutes();
        $this->registerNavigation();
        $this->registerMediaPackages();
    }

    private function registerNavigation()
    {
        \AdminNavigation::setFromArray([
//            [
//                'title' => trans('Users'),
//                'icon' => 'fa fa-group',
//                'priority' => 1000,
//                'pages' => [
//                    (new Page(\App\User::class))->setPriority(0)
//                ]
//            ]
            (new Page(\App\User::class))->setPriority(0),
            (new Page(\App\Project::class))->setPriority(0),
            (new Page(\App\Technology::class))->setPriority(0),
            (new Page(\App\Job::class))->setPriority(0),
            (new Page(\App\Company::class))->setPriority(0),
            (new Page(\App\Admin::class))->setPriority(0),
            (new Page(\App\Contact::class))->setPriority(0),
            (new Page(\App\Comment::class))->setPriority(0)
        ]);
    }

    private function registerNRoutes()
    {
        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.users', function () {
                $content = \App\User::class;
                return AdminSection::view($content, 'Users');
            }]);
        });

        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.projects', function () {
                $content = \App\Project::class;
                return AdminSection::view($content, 'Projects');
            }]);
        });

        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.technologies', function () {
                $content = \App\Technology::class;
                return AdminSection::view($content, 'Technology');
            }]);
        });

        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.jobs', function () {
                $content = \App\Job::class;
                return AdminSection::view($content, 'Jobs');
            }]);
        });

        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.companies', function () {
                $content = \App\Company::class;
                return AdminSection::view($content, 'Companies');
            }]);
        });

        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.admins', function () {
                $content = \App\Admin::class;
                return AdminSection::view($content, 'Admins');
            }]);
        });

        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.contacts', function () {
                $content = \App\Contact::class;
                return AdminSection::view($content, 'Contacts');
            }]);
        });

        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.comments', function () {
                $content = \App\Comment::class;
                return AdminSection::view($content, 'Comments');
            }]);
        });
    }

    private function registerMediaPackages()
    {
        PackageManager::add('front.controllers')
            ->js(null, asset('js/controllers.js'));
    }
}

