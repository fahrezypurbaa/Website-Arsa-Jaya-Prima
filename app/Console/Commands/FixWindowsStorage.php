<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixWindowsStorage extends Command
{
    protected $signature = 'fix:windows-storage';
    protected $description = 'Replace Linux folder names (->) with Windows (-_)';

    public function handle()
    {
        $tables = DB::select("SHOW TABLES");
        $dbName = env('DB_DATABASE');
        $key = "Tables_in_" . $dbName;

        foreach ($tables as $table) {

            $tableName = $table->$key;

            $columns = DB::select("SHOW COLUMNS FROM `$tableName`");

            foreach ($columns as $column) {

                if (
                    str_contains($column->Type, 'varchar') ||
                    str_contains($column->Type, 'text')
                ) {

                    DB::statement("
                        UPDATE `$tableName`
                        SET `$column->Field` =
                        REPLACE(`$column->Field`, '->', '-_')
                    ");

                }

            }

            $this->info("Fixed : ".$tableName);
        }

        $this->info("Selesai.");
    }
}