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
        DB::statement("CREATE VIEW `ram_foraneo_view` AS select `rf`.`id` AS `id`,`rf`.`foraneo_operador_id` AS `foraneo_operador_id`,`rf`.`unidad_id` AS `unidad_id`,`rf`.`fecha` AS `fecha`,`rf`.`concepto` AS `concepto`,`rf`.`tipo` AS `tipo`,`rf`.`monto` AS `monto`,`rf`.`tp` AS `tp`,`rf`.`saldo` AS `saldo`,`rf`.`deleted_at` AS `deleted_at`,`rf`.`created_at` AS `created_at`,`rf`.`updated_at` AS `updated_at` from `fletesram_labaseram`.`ram_foraneos` `rf` where `rf`.`id` in (select max(`fletesram_labaseram`.`ram_foraneos`.`id`) from `fletesram_labaseram`.`ram_foraneos` group by `fletesram_labaseram`.`ram_foraneos`.`foraneo_operador_id`)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_foraneo_view`");
    }
};
