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
        DB::statement("CREATE VIEW `ram_bancos_movimientos_sum_det` AS select `fletesram_labaseram`.`ram_bancos_movimientos`.`periodo` AS `periodo`,`fletesram_labaseram`.`ram_bancos_movimientos`.`bancos_id` AS `bancos_id`,sum((`fletesram_labaseram`.`ram_bancos_movimientos`.`cantidad` * `fletesram_labaseram`.`ram_bancos_movimientos`.`tipo`)) AS `total` from `fletesram_labaseram`.`ram_bancos_movimientos` group by `fletesram_labaseram`.`ram_bancos_movimientos`.`bancos_id`,`fletesram_labaseram`.`ram_bancos_movimientos`.`periodo` union all select `fletesram_labaseram`.`ram_bancos_prestamos`.`periodo` AS `periodo`,`fletesram_labaseram`.`ram_bancos_prestamos`.`bancos_id` AS `bancos_id`,sum((`fletesram_labaseram`.`ram_bancos_prestamos`.`cantidad` * `fletesram_labaseram`.`ram_bancos_prestamos`.`tipo`)) AS `total` from `fletesram_labaseram`.`ram_bancos_prestamos` group by `fletesram_labaseram`.`ram_bancos_prestamos`.`bancos_id`,`fletesram_labaseram`.`ram_bancos_prestamos`.`periodo`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_bancos_movimientos_sum_det`");
    }
};
