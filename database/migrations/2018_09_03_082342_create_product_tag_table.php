<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            //$table->increments('id');

            // Атрибут с внешним ключом на таблицу products
        $table->integer('product_id') // Атрибут product_id
              ->unsigned();            // беззнакового целого типа
        $table->foreign('product_id')             // с внешним ключом,
              ->references('id')      // ссылающимся на атрибут id
              ->on('products')        // таблицы products,
              ->onDelete('CASCADE')   // допускающим удалять кортежи product_tag
                                      // с удалением связанного кортежа products
              ->onUpdate('RESTRICT')  // и запрещающим изменение id в products
        ;

        // Атрибут с внешним ключом на таблицу tags
        $table->integer('tag_id')     // Атрибут tag_id
              ->unsigned();            // беззнакового целого типа
        $table->foreign('tag_id')             // с внешним ключом,
              ->references('id')      // ссылающимся на атрибут id
              ->on('tags')            // таблицы tags,
              ->onDelete('CASCADE')   // допускающим удалять кортежи product_tag
                                      // с удалением связанного кортежа tags
              ->onUpdate('RESTRICT')  // и запрещающим изменение id в tags
        ;

        // Создаём составной первичный ключ,
        // заодно запрещая дублирование кортежей
        $table->primary(['product_id', 'tag_id']);
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
        Schema::dropIfExists('product_tag');
    }
}
