<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Извлекаем из БД коллекцию товаров,
      // отсортированных по возрастанию значений атрибута title
      $statuses = Status::orderBy('name', 'ASC')->get();
      // Использовать шаблон resources/views/products/index.blade.php, где…
      return view('statuses.index')->withStatuses($statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // Форма добавления продукта в БД.
      // Создаём в ОЗУ новый экземпляр (объект) класса Product.
      $status = new Status();
      // Использовать шаблон resources/views/products/create.blade.php, в котором…
      return view('statuses.create')->withStatus($status);
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
      // Принимаем из формы значения полей с name, равными title, price.
      $attributes = $request->only(['name']);

      // Создаём кортеж в БД.
      $status = Status::create($attributes);

      // Создаём всплывающее сообщение об успешном сохранении в БД:
      // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
      // (см. resources/lang/ru/messages.php).
      $request->session()->flash(
          'message',
          __('Created status', ['name' => $status->name])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('statuses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
      // Форма редактирования продукта в БД.
      // Использовать шаблон resources/views/products/edit.blade.php, в котором…
      return view('statuses.edit')->withStatus($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
      // Редактирование продукта в БД.

      // Принимаем из формы значения полей с name, равными title, price.
      $attributes = $request->only(['name']);

      // Обновляем кортеж в БД.
      $status->update($attributes);

      // Создаём всплывающее сообщение об успешном обновлении БД
      $request->session()->flash(
          'message',
          __('Updated status', ['name' => $status->name])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('statuses.index'));
    }

    public function remove(Status $status)
    {
      // Использовать шаблон resources/views/products/remove.blade.php, где…
      // …переменная $producs ⁠— это объект товара.
      return view('statuses.remove')->withStatus($status);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status, Request $request)
    {
      // Удаляем товар из БД.
      $status->delete();

      // Создаём всплывающее сообщение об успешном удалении из БД
      $request->session()->flash(
          'message',
          __('Removed status', ['name' => $status->name])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('statuses.index'));
    }
}
