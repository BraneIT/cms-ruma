<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetCounter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'counter:add-missing-months';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add rows for missing months in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current year
        $currentYear = now()->year;

        // Get the existing months for the current year
        $existingMonths = DB::table('statistics')->where('year', $currentYear)->pluck('month')->toArray();

        // Add rows for the missing months
        for ($month = 1; $month <= 12; $month++) {
            if (!in_array($month, $existingMonths)) {
                DB::table('statistics')->insert([
                    'month' => $month,
                    'year' => $currentYear,
                    'total_users' => 0,
                    'created_at' => now(),
                ]);
            }
        }

        $this->info('Rows added successfully for missing months.');
    }
}
