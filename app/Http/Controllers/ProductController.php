<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function index() {
        $search = request('search');
        if ($search) {

            $products = Product::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        }else{

        $products = Product::all();

    }
        return view('welcome', ['products' => $products, 'search' => $search]);
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {
        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;

        // Upload de imagem

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
                
        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName =md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/products'), $imageName);
        $product->image = $imageName;

        }

        // Preenchendo o campo user_id
        $user = auth()->user();
        $product->user_id = $user->id;

        $product->save();

        // Redirecionar
        return redirect('/')->with('msg', 'Produto anunciado com sucesso!');

    }

    public function show($id) {
         $product = Product::findOrFail($id);

         $user = auth()->user();
         $hasUserStar = false;
         if ($user) {
             $userProducts = $user->productsAsStars->toArray();
            foreach($userProducts as $userProduct){
                if ($userProduct['id'] == $id) {
                    $hasUserStar = true;
                }
            }
         }
         $productOwner = User::where('id', $product->user_id)->first()->toArray();
         return view('produtos.show', ['product' => $product, 'productOwner' => $productOwner, 'hasUserStar' => $hasUserStar]);
    }

    public function dashboard() {
        $user = auth()->user();

        $products = $user->products;

        $productsAsStars = $user->productsAsStars;

        return view('produtos.dashboard', 
            ['products' => $products,
             'productsAsStars' => $productsAsStars]);
    }

    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Produto excluído com sucesso!');
    }

    public function edit($id){
        $user = auth()->user();
        $product = Product::findOrFail($id);

        if($user->id != $product->user->id){
            return redirect('/dashboard');
        }else{
        return view('produtos.edit', ['product' => $product]);
    }
}

    public function update(Request $request){
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
                
        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName =md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/products'), $imageName);
        $data['image'] = $imageName;

        }

        Product::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Produto editado com sucesso!');
    }

    // Star - favorite
    public function favoriteProduct($id){
        // Preenchendo com o id do usuario
        $user = auth()->user();
        $user->productsAsStars()->attach($id);
        $product = Product::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Você marcou uma estrela no produto: '.$product->title);
    }

    public function leaveProduct($id){
        $user = auth()->user();

        $user->productsAsStars()->detach($id);

        $product = Product::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Estrela cancelada no produto: '.$product->title);        
    }
}
