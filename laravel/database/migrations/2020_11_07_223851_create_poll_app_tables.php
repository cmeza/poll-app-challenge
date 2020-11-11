<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePollAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('polls', function (Blueprint $table) {
                $table->id();
                $table->string('title', 100);
                $table->boolean('is_active')->default(true);
                $table->foreignId('poll_type_id');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::create('poll_questions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('poll_id');
                $table->string('question');
                $table->boolean('is_int');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::create('poll_results', function (Blueprint $table) {
                $table->id();
                $table->foreignId('poll_id');
                $table->foreignId('poll_question_id');
                $table->text('value');
                $table->timestamps();
                $table->softDeletes();

                $table->index('poll_id', 'poll_question_id');
            });

            Schema::create('poll_types', function (Blueprint $table) {
                $table->id();
                $table->text('type');
                $table->timestamps();
                $table->softDeletes();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function () {
            Schema::dropIfExists('polls');
            Schema::dropIfExists('poll_questions');
            Schema::dropIfExists('poll_results');
            Schema::dropIfExists('poll_types');
        });
    }
}
