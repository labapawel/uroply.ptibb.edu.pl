<?php

namespace App\Admin\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
// use App\Admin\Form\Element\WeeklyCalendarElement;

class Users extends Section implements Initializable
{
    /**
     * @var string
     */
    protected $title ;
    protected $checkAccess = true;

    public function initialize() {
        $this->title =  __('lang.title.users');
      }
  
    /**
     * Display table for users.
     *
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = \AdminDisplay::datatablesAsync()
            ->setColumns([
                // \AdminColumn::custom('Rola', function ($model) {
                //     return  "<img src=\"".$model->avatar."?a".date('YmdH')."\" 
                //     alt=\"Zdjęcie profilowe\" class=\"img-thumbnail\" style=\"max-height: 100px;\">";
                // }),
                \AdminColumn::text('id', '#')->setWidth('30px'),

                \AdminColumn::link('name', 'Nazwa'),
                \AdminColumn::text('email', 'Email'),
            ])
            ->setDisplaySearch(true)
            ->paginate(20);
            if (auth()->user()->isUser()) {
                $display->setApply(function ($query) {
                    $query->where('id', auth()->id());
                });
            }
     
        return $display;    
    }

    public function isDeletable($model)
        {
            // Tylko administratorzy mogą usuwać rekordy
            return auth()->user()->isAdmin();
            return true;
        }

    /**
     * Form for creating/editing users.
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        
        $pola = [
            \AdminFormElement::text('name', 'Nazwa')->required()->setReadonly(auth()->user()->isUser()),
            \AdminFormElement::text('email', 'Email')->required()->addValidationRule('email')->setReadonly(auth()->user()->isUser())
            ,

        ];

        $pola[] = \AdminFormElement::password('password', 'Hasło');

        if(auth()->user()->isAdmin()){

    

        $pola[]=             \AdminFormElement::multiselect('permission', 'Rola', [
            '1' => 'User',
            '2' => 'Admin',
            '4' => 'SuperAdmin',
        
        ]);

        $pola[]=        \AdminFormElement::daterange('data_od', 'data_do')
        ->setLabel('Zakres dat rezerwacji')
        ->setStartLabel('Data przyjazdu')
        ->setEndLabel('Data wyjazdu')
        ->setHolidays([
            '2025-04-18', // Wielki Piątek
            '2025-04-21', // Wielkanoc
            '2025-05-01', // Święto Pracy
            '2025-05-03', // Święto Konstytucji
            '2025-06-08', // Boże Ciało
            '2025-08-15', // Wniebowzięcie NMP
            '2025-11-01', // Wszystkich Świętych
            '2025-11-11', // Święto Niepodległości
            '2025-12-25', // Boże Narodzenie
            '2025-12-26', // Św. Szczepana
        ])
        ->disablePastDates(true);

        // $pola[] =  \AdminFormElement::weeklycalendar('calendar', 'Kalendarz')
        //     ->setStartHour(7)
        //     ->setEndHour(19);

        }
        return  \AdminForm::panel()->addBody($pola);
    }

    public function onCreate()
    {
        return $this->onEdit(null);
    }
}
