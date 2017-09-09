<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Navigation\Page;
use AdminSection;
use PackageManager;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;

/**
 * Class Contacts
 *
 * @property \App\Contact $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Contacts extends Section
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
    protected $title = 'Contacts';

    /**
     * @var string
     */
    protected $alias = 'contacts';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::text('user_id', 'user_id')->setWidth('30px'),
                AdminColumn::email('email', 'Email')->setWidth('30px'),
                AdminColumn::link('github', 'GitHub'),
                AdminColumn::link('facebook', 'Facebook'),
                AdminColumn::text('skype', 'Skype'),
                AdminColumn::link('google_plus', 'Google_plus'),
                AdminColumn::text('phone', 'Phone'),
//                AdminColumn::text('created_at', 'created_at'),
                AdminColumn::text('updated_at', 'updated_at')
            )->paginate(10);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('user_id', 'user_id'),
            AdminFormElement::email('email', 'Email'),
            AdminFormElement::link('github', 'GitHub'),
            AdminFormElement::link('facebook', 'Facebook'),
            AdminFormElement::text('skype', 'Skype'),
            AdminFormElement::link('google_plus', 'Google_plus'),
            AdminFormElement::text('phone', 'Phone'),
        ]);
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
