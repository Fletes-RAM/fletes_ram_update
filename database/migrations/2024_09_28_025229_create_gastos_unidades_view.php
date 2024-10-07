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
        DB::statement("CREATE VIEW `ram_gastos_unidades` AS select `a`.`fecha` AS `fecha`,`a`.`descripcion` AS `descripcion`,`a`.`total` AS `total`,`b`.`unidad_id` AS `unidad_id` from (`fletesram_labaseram`.`ram_comprobantes_gastos` `a` left join `fletesram_labaseram`.`ram_operadores` `b` on((`a`.`user_id` = `b`.`user_id`)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_gastos_unidades`");
    }
};
