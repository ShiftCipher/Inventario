<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelProductTest extends TestCase
{
  use DatabaseTransactions;

  public function testModelProductProvider()
  {
    $product = App\Product::find(1);
    $provider = App\Provider::find(1);
    $provider->product()->save($product);
    $this->seeInDatabase('products',
    [
      'id' => $product->id,
      'provider_id' => $provider->id
    ]);
  }

  public function testModelProductCategory()
  {
    $product = App\Product::find(1);
    $this->assertInstanceOf(App\Category::class, $product->category);
  }

  public function testModelProductStore()
  {
    $product = App\Product::find(1);
    $store = App\Store::find(1);
    $store->product()->save($product);
    $this->seeInDatabase('products',
    [
      'id' => $product->id,
      'store_id' => $store->id
    ]);
  }

  public function testModelProductState()
  {
    $products = factory(App\Product::class, 10)->create();
    $state = App\State::find(1);
    $state->product()->sync($products);
    $this->seeInDatabase('product_state',
    [
      'state_id' => $state->id
    ]);
  }

  public function testModelProductOrder()
  {
    $products = factory(App\Product::class, 10)->create();
    $order = App\Order::find(1);
    $order->product()->sync($products);
    $this->seeInDatabase('order_product',
    [
      'order_id' => $order->id,
    ]);
  }

  public function testModelProductMaintenance()
  {
    $products = factory(App\Product::class, 10)->create();
    $maintenance = App\Maintenance::find(1);
    $maintenance->product()->sync($products);
    $this->seeInDatabase('maintenance_product',
    [
      'maintenance_id' => $maintenance->id,
    ]);
  }
}