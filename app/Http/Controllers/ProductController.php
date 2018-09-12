<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\tag;	
Use App\Picture;
Use App\Http\Requests\ProductRequest;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Извлекаем из БД коллекцию товаров,
        // отсортированных по возрастанию значений атрибута name
        $products = product::orderBy('name', 'ASC')->get();
        // Использовать шаблон resources/views/products/index.blade.php, где…
        return view('products.index')->withproducts($products); //
		
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		// Форма добавления продукта в БД.
        // Создаём в ОЗУ новый экземпляр (объект) класса product.
        $product = new product();

        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        
		 $tags = Tag::orderBy('name')->get(); // Вытащили все теги из БД
return view('products.create')->withProduct($product)->withTags($tags); // Заполняем шаблон, передавая $product и $tags
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(ProductRequest $request, Picture $Picture)
    {
		 // Добавление продукта в БД
        // Принимаем из формы значения полей с name, равными name, price.
        $attributes = $request->only(['name', 'description', 'price', 'count', 'tag_id']);

        // Создаём кортеж в БД.
        $product = product::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['name' => $product->name])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
		$product->tags()->sync($attributes['tag_id']); // Обновляем связи М:М в БД (см. конец методички laravel.m-to-m)
		
		$path = $request->file('path')->store('');
//var_dump($path);

$attributes = [
  'path' => $path,
  'product_id' => $product->id
  ];
//var_dump($path, $attributes);
$Picture =Picture::create($attributes);
return redirect(route('products.index'));
    
	}
    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
	
 

 
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
		
		 // Форма редактирования продукта в БД.
        // Использовать шаблон resources/views/products/edit.blade.php, в котором…
       $tags = Tag::orderBy('name')->get(); // Вытащили все теги из БД
return view('products.edit')->withProduct($product)->withTags($tags); // Заполняем шаблон, передавая $product и $tags
        //
		   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
		
		// Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными title, price.
        $attributes = $request->only(['name', 'description', 'price', 'count']);

        // Обновляем кортеж в БД.
        $product->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated', ['name'  => $product-> name, 'description' => $product->description, 'price' => $product->price, 'count' => $product->count]
        ));

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
			$attributes = $request->only(['tag_id']); // Извлекаем из запроса ID'шники тегов
			
	//var_dump($attributes['tag_id']);		
			
$product->tags()->sync($attributes['tag_id']); // Обновляем связи М:М в БД (см. конец методички laravel.m-to-m)
      return redirect(route('products.index'));
        //
    }
	
 /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function remove(product $product)
    {
		// Использовать шаблон resources/views/products/remove.blade.php, где…
        // …переменная $producs ⁠— это объект товара.
        return view('products.remove')->withproduct($product);
        //
    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, product $product)
    {
		 // Удаляем товар из БД.
        $product->delete();
  $attributes = $request->only(['name']);

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
            'message',
            __('Removed', ['name' => $product->name]
        ));

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('products.index'));
        //
    }
}
