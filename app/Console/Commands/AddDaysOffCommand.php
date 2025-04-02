<?php
// Wygenerowanie polecenia artisan
// php artisan make:command AddDaysOffCommand

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Yasumi\Yasumi;
use Illuminate\Support\Facades\DB;

class AddDaysOffCommand extends Command
{
    /**
     * Nazwa i sygnatury polecenia konsolowego.
     *
     * @var string
     */
    protected $signature = 'days-off:add {year? : Rok dla którego chcesz dodać dni wolne}';

    /**
     * Opis polecenia konsolowego.
     *
     * @var string
     */
    protected $description = 'Dodaje dni wolne od pracy w Polsce do tabeli days_off';

    /**
     * Wykonanie polecenia konsolowego.
     *
     * @return int
     */
    public function handle()
    {
        // Pobierz rok z argumentu lub użyj bieżącego roku
        $year = $this->argument('year') ?: date('Y');
        
        $this->info("Dodawanie dni wolnych od pracy dla roku {$year}");
        
        // Pobierz wszystkie święta dla Polski w danym roku
        $holidays = Yasumi::create('Poland', $year);
        
        // Pobierz tylko dni wolne od pracy
        $daysOff = $holidays->getHolidays();
        
        $counter = 0;
        
        foreach ($daysOff as $name => $holiday) {
            $date = $holiday->format('Y-m-d');
            
            $fact = $holiday->getName(['pl_PL']); // Nazwa święta po polsku
            
      
                // Użycie modelu DaysOff
                \App\Models\DaysOff::firstOrCreate([
                    'date' => $date,
                ], [
                    'fact' => $fact,
                ]);
                
                $counter++;
                $this->line("Dodano: {$date} - {$fact}");
        }
        
        $this->info("Dodano {$counter} dni wolnych od pracy dla roku {$year}");
        
        return Command::SUCCESS;
    }
}