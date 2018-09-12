<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
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
      $roles = Role::orderBy('name', 'ASC')->get();
      // Использовать шаблон resources/views/products/index.blade.php, где…
      return view('roles.index')->withRoles($roles);
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
      $role = new Role();

      // Использовать шаблон resources/views/products/create.blade.php, в котором…
      return view('roles.create')->withRole($role);
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
      $role = Role::create($attributes);

      // Создаём всплывающее сообщение об успешном сохранении в БД:
      // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
      // (см. resources/lang/ru/messages.php).
      $request->session()->flash(
          'message',
          __('Created role', ['name' => $role->name])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
      // Форма редактирования продукта в БД.
      // Использовать шаблон resources/views/products/edit.blade.php, в котором…
      return view('roles.edit')->withRole($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      // Редактирование продукта в БД.

      // Принимаем из формы значения полей с name, равными title, price.
      $attributes = $request->only(['name']);

      // Обновляем кортеж в БД.
      $role->update($attributes);

      // Создаём всплывающее сообщение об успешном обновлении БД
      $request->session()->flash(
          'message',
          __('Updated role', ['name' => $role->name])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('roles.index'));
    }

    public function remove(Role $role)
    {
      // Использовать шаблон resources/views/products/remove.blade.php, где…
      // …переменная $producs ⁠— это объект товара.
      return view('roles.remove')->withRole($role);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, Request $request)
    {
      // Удаляем товар из БД.
      $role->delete();

      // Создаём всплывающее сообщение об успешном удалении из БД
      $request->session()->flash(
          'message',
          __('Removed role', ['name' => $role->name])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('roles.index'));
    }
}
