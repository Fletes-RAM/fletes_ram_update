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
        DB::statement("CREATE VIEW `ram_unidades_list` AS select `fletesram_labaseram`.`ram_unidades`.`id` AS `id`,concat(`fletesram_labaseram`.`ram_unidades`.`unidad`,' | ',`fletesram_labaseram`.`ram_unidades`.`placas`) AS `unidad` from `fletesram_labaseram`.`ram_unidades` where isnull(`fletesram_labaseram`.`ram_unidades`.`deleted_at`)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_unidades_list`");
    }
};
