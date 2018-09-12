<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Извлекаем из БД коллекцию тегов,
        // отсортированных по возрастанию значений атрибута name
        $tags = tag::orderBy('name', 'ASC')->get();
        // Использовать шаблон resources/views/tags/index.blade.php, где…
        return view('tags.index')->withtags($tags); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		// Форма добавления тега в БД.
        // Создаём в ОЗУ новый экземпляр (объект) класса Tag.
        $tag = new Tag();

        // Использовать шаблон resources/views/tags/create.blade.php, в котором…
        return view('tags.create')->withTag($tag);
        //
		
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		 // Добавление продукта в БД
        // Принимаем из формы значения полей с name, равными name, price.
        $attributes = $request->only(['name', 'description', 'price', 'count']);

        // Создаём кортеж в БД.
        $tag = tag::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['name' => $tag->name])
        );

        // Перенаправляем клиент HTTP на маршрут с именем tags.index
        // (см. routes/web.php).
        return redirect(route('tags.index'));
    
	}
    /**
     * Display the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
	
 

 
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
		
		 // Форма редактирования продукта в БД.
        // Использовать шаблон resources/views/tags/edit.blade.php, в котором…
        return view('tags.edit')->withtag($tag);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tag $tag)
    {
		
		// Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными title, price.
        $attributes = $request->only(['name', 'description', 'price', 'count']);

        // Обновляем кортеж в БД.
        $tag->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated', ['name'  => $tag-> name, 'description' => $tag->description, 'price' => $tag->price, 'count' => $tag->count]
        ));

        // Перенаправляем клиент HTTP на маршрут с именем tags.index
        // (см. routes/web.php).
	

        return redirect(route('tags.index'));
        //
    }
	
 /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function remove(tag $tag)
    {
		// Использовать шаблон resources/views/tags/remove.blade.php, где…
        // …переменная $producs ⁠— это объект товара.
        return view('tags.remove')->withtag($tag);
        //
    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
		 // Удаляем товар из БД.
        $tag->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
            'message',
            __('Removed', ['title' => $tag->title])
        );

        // Перенаправляем клиент HTTP на маршрут с именем tags.index
        // (см. routes/web.php).
        return redirect(route('tags.index'));
        //
    }
}
