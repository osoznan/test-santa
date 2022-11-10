<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamp('created_at')->nullable();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('order_id')
                ->references('id')
                ->on('orders')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::create('user_carts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('name', 50);

            $table->timestamp('created_at')->nullable();
        });

        Schema::create('secret_santa_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('name', 40)->unique();

            // подопечный
            $table->foreignId('child_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secret_santa_members');
        Schema::dropIfExists('user_carts');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
