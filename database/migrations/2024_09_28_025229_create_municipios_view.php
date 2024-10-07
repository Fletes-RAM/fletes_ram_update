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
        DB::statement("CREATE VIEW `ram_municipios` AS select `fletesram_labaseram`.`ram_codigos`.`idEstado` AS `idEstado`,`fletesram_labaseram`.`ram_codigos`.`estado` AS `estado`,`fletesram_labaseram`.`ram_codigos`.`municipio` AS `municipio` from `fletesram_labaseram`.`ram_codigos` group by `fletesram_labaseram`.`ram_codigos`.`idEstado`,`fletesram_labaseram`.`ram_codigos`.`estado`,`fletesram_labaseram`.`ram_codigos`.`municipio`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_municipios`");
    }
};
