<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{

    use RefreshDatabase;

    public function testProductCanBeAdded()
    {
        $this->followingRedirects();
        $response = $this->post(route('products.store'), [
            'name' => 'TestProduct',
            'price' => 299,
            'size' => 'L',
            'count' => 10
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'name' => 'TestProduct',
            'size' => 'L',
            'count' => 10,
            'price' => 29900
        ]);
    }

    public function testProductCanBeOpened()
    {
        $product = Product::factory()->create(['name' => 'TestProduct', 'id' => 666]);

        $this->followingRedirects();

        $response = $this->get(route('products.show', $product));
        $response->assertSee('TestProduct');
    }

    public function testProductCanBeDeleted()
    {
        $product = Product::factory()->create();
        $this->assertDatabaseHas('products', ['name' => $product->name]);

        $this->followingRedirects();

        $response = $this->delete(route('products.destroy', $product));
        $response->assertStatus(200);

        $this->assertDatabaseMissing('products', ['name' => $product->name]);
    }

    public function testProductCanBeEdited()
    {
        $product = Product::factory()->create();
        $this->assertDatabaseHas('products', ['name' => $product->name]);
        $oldName = $product->name;

        $this->followingRedirects();

        $response = $this->put(route('products.update', $product), ['name' => 'NewName']);
        $response->assertStatus(200);

        $this->assertDatabaseMissing('products', ['name' => $oldName]);
        $this->assertDatabaseHas('products', ['name' => 'NewName']);
    }

    public function testProductsCanBeListed()
    {
        $product = Product::factory()->create();
        $otherProduct = Product::factory()->create();

        $this->followingRedirects();

        $response = $this->get(route('products.index'));
        $response->assertSee([$product->name, $otherProduct->name]);
    }
}
