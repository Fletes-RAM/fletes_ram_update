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
        DB::statement("CREATE VIEW `ram_bancos_list` AS select `fletesram_labaseram`.`ram_bancos`.`id` AS `id`,concat(`fletesram_labaseram`.`ram_bancos`.`banco`,' | ',`fletesram_labaseram`.`ram_bancos`.`no_cuenta`) AS `banco` from `fletesram_labaseram`.`ram_bancos`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_bancos_list`");
    }
};
