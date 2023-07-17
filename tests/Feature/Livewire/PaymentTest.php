<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Payment::class);

        $component->assertStatus(200);
    }
}
