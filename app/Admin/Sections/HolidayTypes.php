<?php

namespace App\Admin\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use App\Models\HolidayType;

class HolidayTypes extends Section implements Initializable
{
    /**
     * @var string
     */
    protected $title;
    protected $checkAccess = true;
    
    /**
     * @var string
     */
   // protected $model = \App\Models\daysOff::class;

    public function initialize() 
    {
        $this->title = 'Typy urlopów';
    }

    
    public function isDeletable($model)
        {
            // Tylko administratorzy mogą usuwać rekordy
            return auth()->user()->isAdmin();
            return true;
        }
  
    /**
     * Display table for days off.
     *
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = \AdminDisplay::datatablesAsync()
            ->setColumns([
                \AdminColumn::text('id', '#')->setWidth('30px'),
                \AdminColumn::text('name', 'Nazwa'),
                \AdminColumn::text('comments', 'Opis'),
            ])
            ->setDisplaySearch(true)
            ->paginate(20);
            

        
     
        return $display;    
    }


    /**
     * Form for creating/editing days off.
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $pola = [
            \AdminFormElement::text('name', 'Nazwa')
                ->required()
                ->setValidationRules(['required', 'string', 'max:255']),
            \AdminFormElement::textarea('comments', 'Opis')
                ->setValidationRules(['nullable', 'string']),
        ];

        return \AdminForm::panel()->addBody($pola);
    }

    public function onCreate()
    {
        return $this->onEdit(null);
    }
}

