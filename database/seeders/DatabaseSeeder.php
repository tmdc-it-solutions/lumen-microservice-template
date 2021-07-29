<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exclusions = $this->getSeederFileExclusions();
        $seeders = app('microservice')->getDatabaseSeedersInOrder();

        foreach ($seeders as $seeder) {
            if (in_array($seeder, $exclusions)) {
                $this->command->getOutput()->writeln("<comment>Skipping:</comment> {$seeder}");
                continue;
            }

            $this->call('Database\\Seeders\\' . $seeder);
        }
    }

    private function getSeederFileExclusions(): array
    {
        return ['.', '..', 'Common', 'DatabaseSeeder', 'BaseSeeder'];
    }
}
