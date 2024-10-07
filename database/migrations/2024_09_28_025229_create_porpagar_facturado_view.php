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
        DB::statement("CREATE VIEW `ram_porpagar_facturado` AS select `rc2`.`cliente` AS `cliente`,`rf`.`factura` AS `factura`,sum(`rf`.`total`) AS `total`,'Facturado' AS `Facturado` from ((`fletesram_labaseram`.`ram_facturas` `rf` left join `fletesram_labaseram`.`ram_cotizaciones` `rc` on((`rf`.`cotizacion_id` = `rc`.`id`))) left join `fletesram_labaseram`.`ram_clientes` `rc2` on((`rc`.`cliente_id` = `rc2`.`id`))) where (`rf`.`pagada` = 0) group by `rc2`.`cliente`,`rf`.`factura` union all select `rc2`.`cliente` AS `cliente`,`rfc`.`factura` AS `factura`,sum(`rfc`.`total`) AS `total`,'Facturado' AS `Facturado` from (`fletesram_labaseram`.`ram_facturas_controles` `rfc` left join `fletesram_labaseram`.`ram_clientes` `rc2` on((`rfc`.`cliente_id` = `rc2`.`id`))) where (`rfc`.`pagada` = 0) group by `rc2`.`cliente`,`rfc`.`factura`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_porpagar_facturado`");
    }
};
