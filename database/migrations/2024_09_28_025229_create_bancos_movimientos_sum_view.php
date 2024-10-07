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
        DB::statement("CREATE VIEW `ram_bancos_movimientos_sum` AS select `ram_bancos_movimientos_sum_det`.`periodo` AS `periodo`,`ram_bancos_movimientos_sum_det`.`bancos_id` AS `bancos_id`,sum(`ram_bancos_movimientos_sum_det`.`total`) AS `total` from `fletesram_labaseram`.`ram_bancos_movimientos_sum_det` group by `ram_bancos_movimientos_sum_det`.`periodo`,`ram_bancos_movimientos_sum_det`.`bancos_id`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_bancos_movimientos_sum`");
    }
};
