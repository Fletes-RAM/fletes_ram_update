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
        DB::statement("CREATE VIEW `ram_reporte_unidades` AS select `a`.`created_at` AS `fecha`,`a`.`user_id` AS `user_id`,sum(`b`.`propuesta`) AS `total` from (`fletesram_labaseram`.`ram_asignaciones` `a` left join `fletesram_labaseram`.`ram_cotizaciones` `b` on((`a`.`cotizacion_id` = `b`.`id`))) group by `a`.`created_at`,`a`.`user_id` union select `fletesram_labaseram`.`ram_controles_vehiculares`.`fecha` AS `fecha`,`fletesram_labaseram`.`ram_controles_vehiculares`.`user_id` AS `user_id`,sum(`fletesram_labaseram`.`ram_controles_vehiculares`.`cantidad`) AS `total` from `fletesram_labaseram`.`ram_controles_vehiculares` group by `fletesram_labaseram`.`ram_controles_vehiculares`.`fecha`,`fletesram_labaseram`.`ram_controles_vehiculares`.`user_id` union select `fletesram_labaseram`.`ram_comprobantes_gastos`.`fecha` AS `fecha`,`fletesram_labaseram`.`ram_comprobantes_gastos`.`user_id` AS `user_id`,(sum(`fletesram_labaseram`.`ram_comprobantes_gastos`.`total`) * -(1)) AS `total` from `fletesram_labaseram`.`ram_comprobantes_gastos` where (not((`fletesram_labaseram`.`ram_comprobantes_gastos`.`descripcion` like '%maniob%'))) group by `fletesram_labaseram`.`ram_comprobantes_gastos`.`fecha`,`fletesram_labaseram`.`ram_comprobantes_gastos`.`user_id` union select `ram_vista_comprobantes_combustible`.`fecha` AS `fecha`,`ram_vista_comprobantes_combustible`.`user_id` AS `user_id`,(sum(`ram_vista_comprobantes_combustible`.`total`) * -(1)) AS `total` from `fletesram_labaseram`.`ram_vista_comprobantes_combustible` group by `ram_vista_comprobantes_combustible`.`fecha`,`ram_vista_comprobantes_combustible`.`user_id` union select `a`.`created_at` AS `fecha`,`a`.`user_id` AS `user_id`,(sum(`b`.`sueldo_ope`) * -(1)) AS `total` from (`fletesram_labaseram`.`ram_asignaciones` `a` left join `fletesram_labaseram`.`ram_cotizaciones` `b` on((`a`.`cotizacion_id` = `b`.`id`))) group by `a`.`created_at`,`a`.`user_id` union select `fletesram_labaseram`.`ram_controles_vehiculares`.`fecha` AS `fecha`,`fletesram_labaseram`.`ram_controles_vehiculares`.`user_id` AS `user_id`,(sum(((`fletesram_labaseram`.`ram_controles_vehiculares`.`cantidad` * `fletesram_labaseram`.`ram_controles_vehiculares`.`porcentaje`) / 100)) * -(1)) AS `total` from `fletesram_labaseram`.`ram_controles_vehiculares` group by `fletesram_labaseram`.`ram_controles_vehiculares`.`fecha`,`fletesram_labaseram`.`ram_controles_vehiculares`.`user_id`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_reporte_unidades`");
    }
};
