<?php

namespace App\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Holiday;
use App\Models\HolidayType;
use App\Models\User;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;


class Holidays extends Section implements Initializable
{
    /**
     * @var Holiday
     */
    protected $model = Holiday::class;

    /**
     * @var string
     */
    protected $title = 'Wnioski Urlopowe'; // Updated title
    protected $checkAccess = true;

    /**
     * @var string
     */
    // protected $model = \App\Models\daysOff::class; // Removed old model reference

    public function initialize()
    {
        // $this->title = 'Moje urlopy'; // Title is set directly now
        $this->addToNavigation()->setIcon('fas fa-calendar-alt'); // Optional: Add icon
    }


    public function isDeletable(\Illuminate\Database\Eloquent\Model $model)
    {
        // Only administrators can delete records
        // Consider adding logic for users to delete their own pending requests
        return auth()->user()->isAdmin();
        // return true; // Original line commented out
    }

    /**
     * Display table for holidays.
     *
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync()
            ->setColumns([
                AdminColumn::text('id', '#')->setWidth('50px'),
                AdminColumn::relatedLink('user.name', 'Pracownik')->setWidth('200px'),
                AdminColumn::text('start_date', 'Data od'),//->setFormat('Y-m-d')->setWidth('120px'),
                AdminColumn::text('end_date', 'Data do'),//->setFormat('Y-m-d')->setWidth('120px'),
                AdminColumn::text('hours', 'Godziny')->setWidth('80px'),
                AdminColumn::relatedLink('holidayType.name', 'Typ urlopu')->setWidth('150px'),
                AdminColumn::text('comments', 'Komentarz'),
                AdminColumn::relatedLink('approvedBy.name', 'Zatwierdzający')->setWidth('200px'),
                AdminColumn::datetime('approved_at', 'Data akceptacji')->setFormat('Y-m-d H:i')->setWidth('160px'),
                // Add status column if needed
            ])
            ->setDisplaySearch(true)
            ->paginate(25); // Increased pagination

        // Optionally filter requests for non-admin users
        if (!auth()->user()->isAdmin()) {
            $display->setScopes(['currentUser']); // Assuming you have a 'currentUser' scope in Holiday model
        }

        return $display;
    }


    /**
     * Form for creating/editing holidays.
     *
     * @param int|null $id
     * @return FormInterface
     */
    public function onEdit($id = null)
    {
        $form = AdminForm::panel()->addBody([
            AdminFormElement::select('user_id', 'Pracownik')
                ->setModelForOptions(User::class, 'name')
                ->required()
                ->setReadonly(!auth()->user()->isAdmin()) // Non-admins cannot change the user
                ->setDefaultValue(auth()->id()), // Default to current user
            // AdminFormElement::date('start_date', 'Data rozpoczęcia')
            //     ->required(),
            // AdminFormElement::date('end_date', 'Data zakończenia')
            //     ->required(),

            AdminFormElement::daterange('datyUrlopu', 'Okres urlopu')
                // ->setNumberOfMonths(3)
                // ->setNumberOfColumns(3)
                // ->setFormat('DD.MM.YYYY')
                // ->setTodayAsMinDate()
                // // ->setMaxDate(Carbon::now()->addYear())
                // ->setLocale('pl-PL')
                ->setLockedDays([
                    // '2025-04-09',
                    // '2025-04-10'
                    //  Carbon::now()->addDays(5)->format('Y-m-d'),  // Blokujemy konkretny dzień
                    //  Carbon::now()->addDays(10)->format('Y-m-d'),
                 ])
                // ->setAutoApply(true)
                // ->setShowTooltip(true)
                // ->setTooltipText([
                //     'one' => 'dzień',
                //     'other' => 'dni'
                // ])
                // ->setHelpText('Wybierz okres rezerwacji. Dni oznaczone na czerwono są niedostępne.')
                // ->required();                
                ,
            AdminFormElement::number('hours', 'Liczba godzin')
                // ->required()
                // ->setMin(1) // Assuming minimum 1 hour
                // ->setMax(8)
                , // Assuming max 8 hours for a standard day
            AdminFormElement::select('holiday_type_id', 'Typ urlopu')
                ->setModelForOptions(HolidayType::class, 'name')
                ->required(),
            AdminFormElement::textarea('comments', 'Komentarz / Powód')
                ->setRows(3),
            // Fields typically managed by approval workflow, might be readonly or hidden
            AdminFormElement::select('approved_by', 'Zatwierdzający')
                ->setModelForOptions(User::class, 'name') // Consider filtering to only show managers/admins
                ->setReadonly(!auth()->user()->isAdmin()), // Only admins can set this directly
            AdminFormElement::datetime('approved_at', 'Data akceptacji')
                ->setReadonly(true), // Usually set automatically
            // Add status field if needed (e.g., pending, approved, rejected)
            // AdminFormElement::select('status', 'Status')->setOptions([...])
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    // Optional: Add logic for deleting if needed
    // public function onDelete($id)
    // {
    //     // Add custom delete logic if necessary
    // }
}

