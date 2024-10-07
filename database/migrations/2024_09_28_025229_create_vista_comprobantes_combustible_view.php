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
        DB::statement("CREATE VIEW `ram_vista_comprobantes_combustible` AS select concat('a-',`a`.`id`) AS `id`,`b`.`user_id` AS `user_id`,`b`.`unidad_id` AS `unidad_id`,`a`.`fecha` AS `fecha`,`a`.`gasolinera_id` AS `gasolinera_id`,`a`.`ticket` AS `ticket`,`a`.`litros` AS `litros`,`a`.`precio` AS `precio`,`a`.`total` AS `total`,`a`.`kilometraje` AS `kilometraje`,`a`.`rendimiento` AS `rendimiento`,`a`.`foto_ticket` AS `foto_ticket`,`a`.`foto_tablero_antes` AS `foto_tablero_antes`,`a`.`foto_tablero_despues` AS `foto_tablero_despues`,`a`.`foto_tablero_km` AS `foto_tablero_km` from (`fletesram_labaseram`.`ram_asignaciones_combustibles` `a` left join `fletesram_labaseram`.`ram_asignaciones` `b` on((`a`.`asignacion_id` = `b`.`id`))) union all select concat('e-',`fletesram_labaseram`.`ram_asignaciones_especiales`.`id`) AS `id`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`user_id` AS `user_id`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`unidad_id` AS `unidad_id`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`fecha` AS `fecha`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`gasolinera_id` AS `gasolinera_id`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`ticket` AS `ticket`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`litros` AS `litros`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`precio` AS `precio`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`total` AS `total`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`kilometraje` AS `kilometraje`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`rendimiento` AS `rendimiento`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`foto_ticket` AS `foto_ticket`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`foto_tablero_antes` AS `foto_tablero_antes`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`foto_tablero_despues` AS `foto_tablero_despues`,`fletesram_labaseram`.`ram_asignaciones_especiales`.`foto_tablero_km` AS `foto_tablero_km` from `fletesram_labaseram`.`ram_asignaciones_especiales`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_vista_comprobantes_combustible`");
    }
};
