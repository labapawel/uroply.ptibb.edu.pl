<?php

namespace App\Admin\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use App\Models\daysOff;

class daysOffs extends Section implements Initializable
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
        $this->title = 'Dni wolne';
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
                \AdminColumn::text('date', 'Data'),//->setFormat('d.m.Y'),
                \AdminColumn::text('fact', 'Powód'),
             //   \AdminColumn::datetime('created_at', 'Utworzono')->setFormat('d.m.Y H:i'),
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
            \AdminFormElement::date('date', 'Data')
                ->required()
                //->setReadonly(auth()->user()->isUser())
                ,
                
            \AdminFormElement::text('fact', 'Powód')
                ->required()
                //->setReadonly(auth()->user()->isUser())
        ];

        return \AdminForm::panel()->addBody($pola);
    }

    public function onCreate()
    {
        return $this->onEdit(null);
    }
}

