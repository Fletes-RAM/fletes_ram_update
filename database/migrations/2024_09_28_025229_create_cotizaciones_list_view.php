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
        DB::statement("CREATE VIEW `ram_cotizaciones_list` AS select `a`.`id` AS `id`,concat(`a`.`folio`,' | ',`b`.`cliente`,' | ',`c`.`nombre`) AS `nombre` from ((`fletesram_labaseram`.`ram_cotizaciones` `a` left join `fletesram_labaseram`.`ram_clientes` `b` on((`a`.`cliente_id` = `b`.`id`))) left join `fletesram_labaseram`.`ram_nombres_rutas` `c` on((`a`.`ruta_id` = `c`.`id`))) where isnull(`a`.`deleted_at`)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_cotizaciones_list`");
    }
};
