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
        DB::statement("CREATE VIEW `ram_facturas_unidades_inicial` AS select `a`.`factura` AS `factura`,`a`.`total` AS `total`,`a`.`pagada` AS `pagada`,`a`.`fecha_pago` AS `fecha_pago`,`b`.`id` AS `id`,`b`.`unidad_id` AS `unidad_id`,`d`.`unidad` AS `unidad`,`d`.`placas` AS `placas` from ((`fletesram_labaseram`.`ram_facturas` `a` left join `fletesram_labaseram`.`ram_asignaciones` `b` on((`a`.`cotizacion_id` = `b`.`cotizacion_id`))) left join `fletesram_labaseram`.`ram_unidades` `d` on((`b`.`unidad_id` = `d`.`id`))) where ((`a`.`factura` <> 'AJUSTE MANUAL') and (`a`.`pagada` = 1))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_facturas_unidades_inicial`");
    }
};
