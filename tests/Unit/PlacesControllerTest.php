<?php

namespace Tests\Unit;

use App\Http\Controllers\PlacesController;
use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;



class PlacesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_gets_all_places()
    {
        Place::factory()->create([
            'name' => "Test name",
            'slug' => "slug_name",
            'city' => "São Paulo",
            'state' => "São Paulo"
        ]);

        $controller = new PlacesController();
        $response = $controller->getAll();
        $responseData = json_decode($response->getContent(), true);

        $this->assertIsArray($responseData);
        $this->assertCount(1, $responseData['places']);
        $this->assertEquals('success', $responseData['status']);
    }

    /** @test */
    public function it_finds_one_place_by_id()
    {
        $place = Place::factory()->create([
            'name' => "Test name",
            'slug' => "slug_name_test",
            'city' => "São Paulo",
            'state' => "São Paulo"
        ]);

        $controller = new PlacesController();
        $response = $controller->findOne($place->id);

        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals($place->id, $responseData["id"]);
    }

    /** @test */
    public function it_updates_a_place()
    {
        $place = Place::factory()->create([
            'name' => "Test name",
            'slug' => "slug_name_test2",
            'city' => "São Paulo",
            'state' => "São Paulo"
        ]);
        $newName = 'New Name';

        $controller = new PlacesController();
        $request = new Request(['name' => $newName]);
        $response = $controller->update($request, $place->id);

        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals('Updated Successfully', $responseData['message']);
        $this->assertEquals($newName, Place::find($place->id)->name);
    }
}
