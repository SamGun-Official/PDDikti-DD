<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TotalResetMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:refreshAll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Completely revert all migrations, or in other word, drop everything in the database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate', [
            '--database' => 'istts_kampus',
            '--path' => 'database/migrations/istts_kampus/pre_migrate',
        ]);
        $this->call('migrate', [
            '--database' => 'pddikti',
            '--path' => 'database/migrations/pddikti/pre_migrate',
        ]);
        $this->call('migrate', [
            '--database' => 'istts_dosen',
            '--path' => 'database/migrations/istts_dosen/pre_migrate',
        ]);
        $this->call('migrate:fresh', [
            '--database' => 'pddikti',
            '--path' => 'database/migrations/pddikti',
        ]);
        $this->call('migrate:fresh', [
            '--database' => 'istts_kampus',
            '--path' => 'database/migrations/istts_kampus',
        ]);
        $this->call('migrate:fresh', [
            '--database' => 'istts_dosen',
            '--path' => 'database/migrations/istts_dosen',
        ]);
        $this->call('migrate', [
            '--database' => 'pddikti',
            '--seed' => '',
            '--seeder' => 'DatabasePDDiktiSeeder',
        ]);
        $this->call('migrate', [
            '--database' => 'istts_kampus',
            '--seed' => '',
            '--seeder' => 'DatabaseKampusSeeder',
        ]);
        $this->call('migrate', [
            '--database' => 'istts_dosen',
            '--seed' => '',
            '--seeder' => 'DatabaseDosenSeeder',
        ]);
        $this->call('migrate', [
            '--database' => 'istts_kampus',
            '--path' => 'database/migrations/istts_kampus/post_migrate',
        ]);
        $this->call('migrate', [
            '--database' => 'pddikti',
            '--path' => 'database/migrations/pddikti/post_migrate',
        ]);
        $this->call('migrate', [
            '--database' => 'istts_dosen',
            '--path' => 'database/migrations/istts_dosen/post_migrate',
        ]);
    }
}
