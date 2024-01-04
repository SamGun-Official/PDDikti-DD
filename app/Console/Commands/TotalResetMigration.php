<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        try {
            DB::connection(env("DB_CONNECTION_ISTTSKAMPUS", ""))->statement("DROP MATERIALIZED VIEW mv_nilai");
            DB::connection(env("DB_CONNECTION_ISTTSKAMPUS", ""))->statement("DROP MATERIALIZED VIEW mv_dosen");

            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_mahasiswa");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_periode");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_kelas");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_mata_kuliah");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_nilai");

            DB::connection(env("DB_CONNECTION_ISTTSDOSEN", ""))->statement("DROP MATERIALIZED VIEW mv_kelas");
            DB::connection(env("DB_CONNECTION_ISTTSDOSEN", ""))->statement("DROP MATERIALIZED VIEW mv_mata_kuliah");
        } catch (QueryException $qe) {
            Log::error($qe->getMessage());
        }

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
            '--seed' => true,
            '--seeder' => 'DatabasePDDiktiSeeder',
        ]);
        $this->call('migrate', [
            '--database' => 'istts_kampus',
            '--seed' => true,
            '--seeder' => 'DatabaseKampusSeeder',
        ]);
        $this->call('migrate', [
            '--database' => 'istts_dosen',
            '--seed' => true,
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
