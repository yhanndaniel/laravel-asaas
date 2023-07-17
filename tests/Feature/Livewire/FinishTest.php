<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Finish;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FinishTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Finish::class);

        $component->assertStatus(200);
    }
}
