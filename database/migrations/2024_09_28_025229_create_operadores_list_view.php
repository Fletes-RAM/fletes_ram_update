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
        DB::statement("CREATE VIEW `ram_operadores_list` AS select `fletesram_labaseram`.`ram_users`.`id` AS `id`,concat(`fletesram_labaseram`.`ram_users`.`first_name`,' ',`fletesram_labaseram`.`ram_users`.`last_name`) AS `nombre` from `fletesram_labaseram`.`ram_users` where `fletesram_labaseram`.`ram_users`.`id` in (select `fletesram_labaseram`.`ram_operadores`.`user_id` from `fletesram_labaseram`.`ram_operadores` where isnull(`fletesram_labaseram`.`ram_operadores`.`deleted_at`))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `ram_operadores_list`");
    }
};
