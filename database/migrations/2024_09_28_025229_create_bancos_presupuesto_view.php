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
        DB::statement("CREATE VIEW `ram_bancos_presupuesto` AS select `ram_bancos_detalle`.`bancos_id` AS `bancos_id`,substring_index(`ram_bancos_detalle`.`periodo`,'-',1) AS `mes`,substring_index(substring_index(`ram_bancos_detalle`.`periodo`,'-',2),'-',-(1)) AS `anno`,`ram_bancos_detalle`.`periodo` AS `periodo`,`ram_bancos_detalle`.`categoria_id` AS `categoria_id`,sum(`ram_bancos_detalle`.`total`) AS `total` from `fletesram_labaseram`.`ram_bancos_detalle` group by `ram_bancos_detalle`.`bancos_id`,`ram_bancos_detalle`.`periodo`,`ram_bancos_detalle`.`categoria_id` order by (`ram_bancos_detalle`.`categoria_id` = 4) desc,`ram_bancos_detalle`.`categoria_id`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_bancos_presupuesto`");
    }
};
