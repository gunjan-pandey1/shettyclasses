<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('crm_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->index()->nullable();
            $table->unsignedInteger('student_count')->nullable();
            $table->integer('status')->nullable()->index()->default(1);
            $table->dateTime('created_at')->index()->useCurrent();
            $table->integer('updated_at')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_organizations');
    }
};
