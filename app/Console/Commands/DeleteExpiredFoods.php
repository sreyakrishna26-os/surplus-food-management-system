<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\tbl_food;
use Carbon\Carbon;

class DeleteExpiredFoods extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'foods:delete-expired';

    /**
     * The console command description.
     */
    protected $description = 'Soft delete foods after 1 hour and 30 minutes from registration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiryTime = Carbon::now()->subMinutes(90);

        $foods = tbl_food::where('food_regdate', '<=', $expiryTime)
            ->whereNull('deleted_at')
            ->get();

        $count = 0;

        foreach ($foods as $food) {
            $food->delete();
            $count++;
        }

        $this->info($count . ' expired food item(s) deleted successfully.');

        return Command::SUCCESS;
    }
}