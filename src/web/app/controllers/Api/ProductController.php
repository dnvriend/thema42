<?php

namespace Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use BaseController;
use Validator;
use Input;
use Request;
use Response;
use Product;
use ShoppingList;

class ProductController extends BaseController {

	public function index() {
		try
		{
			$products = Product::all();
		}
		catch (ModelNotFoundException $exception)
		{
			return Response::json([
				'error' => [
					'message' => 'No products available'
				]
			], 404);
		}

		return Response::json([
			'data' => $products
		], 200);
	}
	
	public function store($listId) {
		$validator = Validator::make(Input::all(), ['products' => 'required']);

		if ($validator->fails()) {
			return Response::json([
				'error' => [
					'message' => 'Malformed request'
				]
			], 400);
		}

		try
		{
			$shoppingList = ShoppingList::findOrFail($listId);
		}
		catch (ModelNotFoundException $exception)
		{
			return Response::json([
				'error' => [
					'message' => 'Shopping list does not exist'
				]
			], 404);
		}

		$products = Input::get('products');

		foreach ($products as $product) {
			$productData = [
				'product_id' => (integer) $product['id'],
				'quantity' => (integer) $product['quantity'],
				'scanned' => (boolean) false
			];

			$shoppingList->products()->attach($shoppingList->id, $productData);	
		}

		return Response::json([
			'data' => $shoppingList->products,
			'meta' => [
				'update_product' => Request::url() . '/' . $products[0]['id'],
				'delete_product' => Request::url() . '/' . $products[0]['id']
			]
		], 201);
	}

	public function update($listId, $productId) {
		$validator = Validator::make(Input::all(), ['product' => 'required']);

		if($validator->fails()) {
			return Response::json([
				'error' => [
					'message' => 'Malformed request'
				]
			], 400);
		}

		try
		{
			$shoppingList = ShoppingList::findOrFail($listId);
		}
		catch (ModelNotFoundException $exception)
		{
			return Response::json([
				'error' => [
					'message' => 'Shopping list does not exist'
				]
			], 404);
		}

		$productData = Input::get('product');

		$shoppingList->products()->updateExistingPivot($productId, $productData);

		return Response::json([
			'data' => $shoppingList->products
		], 200);
	}
}
