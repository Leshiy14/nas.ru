<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            // НАЧАЛО БЛОКА ИЗМЕНЕНИЙ
            $table->integer('user_id')  // Атрибут manufacturer_id
                  ->unsigned();                 // беззнакового целого типа
            //$table->engine = 'InnoDB';        // Тип таблицы
            //$table->index('manufacturer_id'); // Индексация manufacturer_id
            $table->foreign('user_id')  // Создание внешнего ключа,
                  ->references('id')            // ссылающегося на атрибут id
                  ->on('users')         // в таблице manufacturers,
                  ->onDelete('CASCADE')         // разрешающего удалять
                                                // производителя
                                                // вместе с сопоставленными продуктами
                  ->onUpdate('RESTRICT')        // и запрещающим изменение id
                                                // в manufacturers
            ;
            // КОНЕЦ БЛОКА ИЗМЕНЕНИЙ

            // НАЧАЛО БЛОКА ИЗМЕНЕНИЙ
            $table->integer('status_id')  // Атрибут manufacturer_id
                  ->unsigned();                 // беззнакового целого типа
            //$table->engine = 'InnoDB';        // Тип таблицы
            //$table->index('manufacturer_id'); // Индексация manufacturer_id
            $table->foreign('status_id')  // Создание внешнего ключа,
                  ->references('id')            // ссылающегося на атрибут id
                  ->on('statuses')         // в таблице manufacturers,
                  ->onDelete('CASCADE')         // разрешающего удалять
                                                // производителя
                                                // вместе с сопоставленными продуктами
                  ->onUpdate('RESTRICT')        // и запрещающим изменение id
                                                // в manufacturers
            ;
            // КОНЕЦ БЛОКА ИЗМЕНЕНИЙ

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
        Schema::dropIfExists('orders');
    }
}
