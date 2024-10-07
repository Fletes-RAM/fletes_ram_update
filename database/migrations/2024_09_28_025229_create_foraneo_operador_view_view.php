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
        DB::statement("CREATE VIEW `ram_foraneo_operador_view` AS select `fo`.`foraneo_operador` AS `foraneo_operador`,`rf`.`saldo` AS `saldo`,`rf`.`created_at` AS `created_at` from (`fletesram_labaseram`.`ram_foraneo_view` `rf` left join `fletesram_labaseram`.`ram_foraneos_operadores` `fo` on((`rf`.`foraneo_operador_id` = `fo`.`id`))) where (isnull(`fo`.`deleted_at`) and `rf`.`id` in (select max(`rf`.`id`) from `fletesram_labaseram`.`ram_foraneos` group by `fletesram_labaseram`.`ram_foraneos`.`foraneo_operador_id`))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_foraneo_operador_view`");
    }
};
