<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('trainings', function (Blueprint $table) {
            // Supprimez la clé étrangère existante (si elle existe)
            $table->dropForeign(['user_id']);

            // Modifiez la colonne user_id pour qu'elle soit not null
            $table->unsignedBigInteger('user_id')->nullable(false)->change();

            // Ajoutez la nouvelle clé étrangère
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('trainings', function (Blueprint $table) {
            // Supprimez la clé étrangère
            $table->dropForeign(['user_id']);

            // Modifiez la colonne user_id pour qu'elle soit nullable
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });
    }
};
