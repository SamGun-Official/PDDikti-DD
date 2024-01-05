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
            DB::connection(env("DB_CONNECTION_ISTTSKAMPUS", ""))->unprepared('
                CREATE OR REPLACE PROCEDURE update_tabel(
                    nama_tabel VARCHAR2,
                    type_refresh VARCHAR2
                ) AS BEGIN
                    dbms_mview.refresh(nama_tabel, type_refresh);
                END;
            ');

            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_mahasiswa");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_periode");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_kelas");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_mata_kuliah");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->statement("DROP MATERIALIZED VIEW mv_nilai");
            DB::connection(env("DB_CONNECTION_PDDIKTI", ""))->unprepared('
                CREATE OR REPLACE PROCEDURE update_tabel(
                    nama_tabel VARCHAR2,
                    type_refresh VARCHAR2
                ) AS BEGIN
                    dbms_mview.refresh(nama_tabel, type_refresh);
                END;
            ');

            DB::connection(env("DB_CONNECTION_ISTTSDOSEN", ""))->statement("DROP MATERIALIZED VIEW mv_kelas");
            DB::connection(env("DB_CONNECTION_ISTTSDOSEN", ""))->statement("DROP MATERIALIZED VIEW mv_mata_kuliah");
            DB::connection(env("DB_CONNECTION_ISTTSDOSEN", ""))->unprepared('
                CREATE OR REPLACE PROCEDURE update_tabel(
                    nama_tabel VARCHAR2,
                    type_refresh VARCHAR2
                ) AS BEGIN
                    dbms_mview.refresh(nama_tabel, type_refresh);
                END;
            ');

            DB::connection(env("DB_CONNECTION_ISTTSKAMPUS", ""))->unprepared('
                CREATE OR REPLACE PROCEDURE insert_data_dosen(
                    nidn_dosen VARCHAR2,
                    nik VARCHAR2,
                    nama_lengkap VARCHAR2,
                    jenis_kelamin VARCHAR2,
                    email VARCHAR2,
                    tanggal_lahir DATE,
                    asal_kampus VARCHAR2,
                    jabatan_fungsional VARCHAR2,
                    pendidikan_terakhir VARCHAR2,
                    ikatan_kerja VARCHAR2,
                    program_studi VARCHAR2,
                    status VARCHAR2,
                    created_at TIMESTAMP,
                    updated_at TIMESTAMP
                ) AS BEGIN
                    INSERT INTO dosen@' . env('DB_DBLINK_2', '') . ' VALUES(
                        nidn_dosen,
                        nik,
                        nama_lengkap,
                        jenis_kelamin,
                        email,
                        tanggal_lahir,
                        asal_kampus,
                        jabatan_fungsional,
                        pendidikan_terakhir,
                        ikatan_kerja,
                        program_studi,
                        status,
                        created_at,
                        updated_at
                    );
                    dbms_mview.refresh(\'mv_dosen\', \'f\');
                END;
            ');
            DB::connection(env("DB_CONNECTION_ISTTSKAMPUS", ""))->unprepared('
                CREATE OR REPLACE PROCEDURE update_data_dosen(
                    nidn_dosen VARCHAR2,
                    status VARCHAR2,
                    updated_at TIMESTAMP
                ) AS BEGIN
                    UPDATE dosen@' . env('DB_DBLINK_2', '') . ' SET
                        status = status,
                        updated_at = updated_at
                    WHERE nidn_dosen = nidn_dosen;
                    dbms_mview.refresh(\'mv_dosen\', \'f\');
                END;
            ');
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
