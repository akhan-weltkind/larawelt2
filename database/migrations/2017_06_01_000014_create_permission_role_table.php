<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ( Schema::hasTable('permission_role') ){
            Schema::table('permission_role', function (Blueprint $table) {
                $table->dropForeign('permission_role_role_id_foreign');
                $table->dropColumn('role_id');
                $table->dropForeign('permission_role_permission_id_foreign');
                $table->dropColumn('permission_id');
            });
        }

        Schema::dropIfExists('permission_role');
    }
}
