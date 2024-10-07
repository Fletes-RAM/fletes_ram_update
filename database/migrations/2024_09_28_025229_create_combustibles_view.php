<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW `ram_combustibles` AS select `fletesram_labaseram`.`ram_costos_combustibles`.`costo` AS `costo`,concat(`fletesram_labaseram`.`ram_costos_combustibles`.`combustible`,' | $',`fletesram_labaseram`.`ram_costos_combustibles`.`costo`,' x lt.') AS `combustible` from `fletesram_labaseram`.`ram_costos_combustibles`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_combustibles`");
    }
};
