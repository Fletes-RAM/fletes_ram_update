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
        DB::statement("CREATE VIEW `ram_bancos_reporte_presupuesto` AS select `fletesram_labaseram`.`ram_bancos_saldos`.`bancos_id` AS `bancos_id`,`fletesram_labaseram`.`ram_bancos_saldos`.`periodo` AS `periodo`,right(`fletesram_labaseram`.`ram_bancos_saldos`.`periodo`,4) AS `year`,substring_index(`fletesram_labaseram`.`ram_bancos_saldos`.`periodo`,'-',1) AS `mes`,0 AS `categoria_id`,0 AS `subcategoria_id`,`fletesram_labaseram`.`ram_bancos_saldos`.`saldo_inicial` AS `total` from `fletesram_labaseram`.`ram_bancos_saldos` union all select `ram_bancos_detalle`.`bancos_id` AS `bancos_id`,`ram_bancos_detalle`.`periodo` AS `periodo`,right(`ram_bancos_detalle`.`periodo`,4) AS `year`,substring_index(`ram_bancos_detalle`.`periodo`,'-',1) AS `mes`,`ram_bancos_detalle`.`categoria_id` AS `categoria_id`,`ram_bancos_detalle`.`subcategoria_id` AS `subcategoria_id`,`ram_bancos_detalle`.`total` AS `total` from `fletesram_labaseram`.`ram_bancos_detalle` union all select `fletesram_labaseram`.`ram_bancos_saldos`.`bancos_id` AS `bancos_id`,`fletesram_labaseram`.`ram_bancos_saldos`.`periodo` AS `periodo`,right(`fletesram_labaseram`.`ram_bancos_saldos`.`periodo`,4) AS `year`,substring_index(`fletesram_labaseram`.`ram_bancos_saldos`.`periodo`,'-',1) AS `mes`,0 AS `categoria_id`,1 AS `subcategoria_id`,(`fletesram_labaseram`.`ram_bancos_saldos`.`saldo_final` * -(1)) AS `total` from `fletesram_labaseram`.`ram_bancos_saldos`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_bancos_reporte_presupuesto`");
    }
};
