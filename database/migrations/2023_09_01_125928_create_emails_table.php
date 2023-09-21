<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('subject')->nullable();
            $table->string('from_name')->nullable();
            $table->string('reply_to_email')->nullable();
            $table->longText('message');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();
        });
        Schema::create('emailables', function (Blueprint $table) {
            $table->foreignId('email_id')
                ->references('id')
                ->on('emails')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('email');
            $table->morphs('emailable');
            $table->timestamp('sent_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emailables');
        Schema::dropIfExists('emails');
    }
};
