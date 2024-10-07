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
        DB::statement("CREATE VIEW `ram_reporte_unidades_view` AS select date_format(`ram_reporte_unidades`.`fecha`,'%Y-%m') AS `fecha`,`ram_reporte_unidades`.`user_id` AS `user_id`,sum(`ram_reporte_unidades`.`total`) AS `total` from `fletesram_labaseram`.`ram_reporte_unidades` group by date_format(`ram_reporte_unidades`.`fecha`,'%Y-%m'),`ram_reporte_unidades`.`user_id`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_reporte_unidades_view`");
    }
};
