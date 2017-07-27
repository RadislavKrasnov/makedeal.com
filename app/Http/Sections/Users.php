<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Users
 *
 * @property \App\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Users';

    /**
     * @var string
     */
    protected $alias = 'users';

    public function getIcon()
    {
        return 'fa fa-group';
    }

    public function initialize()
    {

        $this->addToNavigation($priority = 500, function() {
            return \App\User::count();
        });

    }


    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::text('first_name', 'First Name')->setWidth('100px'),
                AdminColumn::text('last_name', 'Last Name'),
                AdminColumn::text('username', 'Username'),
//                AdminColumn::text('password', 'Password'),
                AdminColumn::text('age', 'Age')->setWidth('30px'),
                AdminColumn::text('experience', 'Experience')->setWidth('30px'),
                AdminColumn::text('created_at', 'created_at'),
                AdminColumn::text('job_id', 'job_id'),
                AdminColumn::text('countries_id', 'countries_id'),
                AdminColumn::text('regions_id', 'regions_id'),
                AdminColumn::text('cities_id', 'cities_id')
            )->paginate(10);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // todo: remove if unused
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}
