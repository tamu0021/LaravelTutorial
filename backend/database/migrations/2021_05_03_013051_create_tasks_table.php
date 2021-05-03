<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folder_id')->unsigned();
            $table->string('title', 100);
            $table->date('due_date');
            /* タスク作成時は未着手のはず。その状態では1が入るよう設定 */
            $table->integer('status')->default(1);
            $table->timestamps();

            /* 外部キーを設定する。 */
            /* タスクテーブルのフォルダID列には実在するIDのみ入れられるようにする。 */
            /* そうすることでデータの不整合を防ぐ。 */
            $table->foreign('folder_id')->references('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
