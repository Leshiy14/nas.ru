<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('second_name');
            $table->string('email')->unique();
            $table->string('password');

            // НАЧАЛО БЛОКА ИЗМЕНЕНИЙ
            $table->integer('role_id')  // Атрибут manufacturer_id
                  ->unsigned();                 // беззнакового целого типа
            //$table->engine = 'InnoDB';        // Тип таблицы
            //$table->index('manufacturer_id'); // Индексация manufacturer_id
            $table->foreign('role_id')  // Создание внешнего ключа,
                  ->references('id')            // ссылающегося на атрибут id
                  ->on('roles')         // в таблице manufacturers,
                  ->onDelete('CASCADE')         // разрешающего удалять
                                                // производителя
                                                // вместе с сопоставленными продуктами
                  ->onUpdate('RESTRICT')        // и запрещающим изменение id
                                                // в manufacturers
            ;
            // КОНЕЦ БЛОКА ИЗМЕНЕНИЙ

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
