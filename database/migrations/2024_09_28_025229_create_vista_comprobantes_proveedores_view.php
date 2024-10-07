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
        DB::statement("CREATE VIEW `ram_vista_comprobantes_proveedores` AS select `ram_vista_comprobantes_combustible`.`id` AS `id`,`ram_vista_comprobantes_combustible`.`user_id` AS `user_id`,`ram_vista_comprobantes_combustible`.`unidad_id` AS `unidad_id`,`ram_vista_comprobantes_combustible`.`fecha` AS `fecha`,`ram_vista_comprobantes_combustible`.`gasolinera_id` AS `gasolinera_id`,`ram_vista_comprobantes_combustible`.`ticket` AS `ticket`,`ram_vista_comprobantes_combustible`.`litros` AS `litros`,`ram_vista_comprobantes_combustible`.`precio` AS `precio`,`ram_vista_comprobantes_combustible`.`total` AS `total`,`ram_vista_comprobantes_combustible`.`kilometraje` AS `kilometraje`,`ram_vista_comprobantes_combustible`.`rendimiento` AS `rendimiento`,`ram_vista_comprobantes_combustible`.`foto_ticket` AS `foto_ticket`,`ram_vista_comprobantes_combustible`.`foto_tablero_antes` AS `foto_tablero_antes`,`ram_vista_comprobantes_combustible`.`foto_tablero_despues` AS `foto_tablero_despues`,`ram_vista_comprobantes_combustible`.`foto_tablero_km` AS `foto_tablero_km` from `fletesram_labaseram`.`ram_vista_comprobantes_combustible` where (not(`ram_vista_comprobantes_combustible`.`id` in (select `fletesram_labaseram`.`ram_proveedores`.`comprobante_id` from `fletesram_labaseram`.`ram_proveedores`)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_vista_comprobantes_proveedores`");
    }
};
