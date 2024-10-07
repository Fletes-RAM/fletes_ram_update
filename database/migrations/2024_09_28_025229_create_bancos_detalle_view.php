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
        DB::statement("CREATE VIEW `ram_bancos_detalle` AS select concat('m-',`fletesram_labaseram`.`ram_bancos_movimientos`.`id`) AS `id`,`fletesram_labaseram`.`ram_bancos_movimientos`.`bancos_id` AS `bancos_id`,substring_index(`fletesram_labaseram`.`ram_bancos_movimientos`.`periodo`,'-',1) AS `mes`,substring_index(substring_index(`fletesram_labaseram`.`ram_bancos_movimientos`.`periodo`,'-',2),'-',-(1)) AS `anno`,`fletesram_labaseram`.`ram_bancos_movimientos`.`periodo` AS `periodo`,`fletesram_labaseram`.`ram_bancos_movimientos`.`movimiento` AS `movimiento`,(`fletesram_labaseram`.`ram_bancos_movimientos`.`tipo` * `fletesram_labaseram`.`ram_bancos_movimientos`.`cantidad`) AS `total`,`fletesram_labaseram`.`ram_bancos_movimientos`.`observaciones` AS `observaciones`,`fletesram_labaseram`.`ram_bancos_movimientos`.`fecha` AS `fecha`,`fletesram_labaseram`.`ram_bancos_movimientos`.`folio` AS `folio`,`fletesram_labaseram`.`ram_bancos_movimientos`.`categoria_id` AS `categoria_id`,`fletesram_labaseram`.`ram_bancos_movimientos`.`subcategoria_id` AS `subcategoria_id` from `fletesram_labaseram`.`ram_bancos_movimientos` union all select concat('p-',`fletesram_labaseram`.`ram_bancos_prestamos`.`id`) AS `id`,`fletesram_labaseram`.`ram_bancos_prestamos`.`bancos_id` AS `bancos_id`,substring_index(`fletesram_labaseram`.`ram_bancos_prestamos`.`periodo`,'-',1) AS `mes`,substring_index(substring_index(`fletesram_labaseram`.`ram_bancos_prestamos`.`periodo`,'-',2),'-',-(1)) AS `anno`,`fletesram_labaseram`.`ram_bancos_prestamos`.`periodo` AS `periodo`,`fletesram_labaseram`.`ram_bancos_prestamos`.`movimiento` AS `movimiento`,(`fletesram_labaseram`.`ram_bancos_prestamos`.`tipo` * `fletesram_labaseram`.`ram_bancos_prestamos`.`cantidad`) AS `total`,concat('Prestamo: ',`ru`.`first_name`,' ',`ru`.`last_name`,' ',`fletesram_labaseram`.`ram_bancos_prestamos`.`observaciones`) AS `observaciones`,`fletesram_labaseram`.`ram_bancos_prestamos`.`fecha` AS `fecha`,`fletesram_labaseram`.`ram_bancos_prestamos`.`folio` AS `folio`,`fletesram_labaseram`.`ram_bancos_prestamos`.`categoria_id` AS `categoria_id`,`fletesram_labaseram`.`ram_bancos_prestamos`.`subcategoria_id` AS `subcategoria_id` from (`fletesram_labaseram`.`ram_bancos_prestamos` left join `fletesram_labaseram`.`ram_users` `ru` on((`fletesram_labaseram`.`ram_bancos_prestamos`.`user_id` = `ru`.`id`)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_bancos_detalle`");
    }
};
