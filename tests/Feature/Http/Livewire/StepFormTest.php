<?php

namespace Tests\Feature\Http\Livewire;

use Tests\TestCase;
use App\Models\Step;
use Livewire\Livewire;
use App\Models\Process;
use App\Http\Livewire\StepsForm;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StepFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function steps_form_component_render_correct_view()
    {
        Livewire::test(StepsForm::class)
            ->assertViewIs('livewire.steps-form')
            ->assertViewHas('processes');
    }

    /** @test */
    public function steps_form_prepares_for_creating_new_record()
    {
        Livewire::test(StepsForm::class)
            ->set('fields.name', 'New name')
            ->set('fields.process_id', 1)
            ->set('fields.order', 1)
            ->set('fields.description', 'New description')
            ->set('is_editing', true)
            ->emit('wantsCreateStep')
            ->assertSet('fields.name', null)
            ->assertSet('fields.process_id', null)
            ->assertSet('fields.order', null)
            ->assertSet('fields.description', null)
            ->assertSet('is_editing', false)
            ->assertDispatchedBrowserEvent('showStepModal')
            ;
    }

    /** @test */
    public function steps_form_prepares_for_editing_record()
    {
        $step = Step::factory()->create();

        Livewire::test(StepsForm::class)
            ->emit('wantsEditStep', $step)
            ->assertSet('step', $step)
            ->assertSet('is_editing', true)
            ->assertSet('fields.name', $step->name)
            ->assertSet('fields.order', $step->order)
            ->assertSet('fields.process_id', $step->process_id)
            ->assertSet('fields.description', $step->description)
            ->assertDispatchedBrowserEvent('showStepModal')
            ;
    }

    /** @test */
    public function steps_form_create_new_record()
    {
        $process = Process::factory()->create();

        Livewire::test(StepsForm::class)
            ->emit('wantsCreateStep')
            ->set('fields.name', 'New name')
            ->set('fields.process_id', $process->id)
            ->set('fields.order', 3)
            ->set('fields.description', 'New description')
            ->call('store')
            ->assertEmitted('stepSaved')
            ->assertDispatchedBrowserEvent('hideStepModal')
            ;

        $this->assertDatabaseHas('steps', [
            'name' => 'New name',
            'process_id' => $process->id,
            'order' => 3,
            'description' => 'New description',
        ]);
    }

    /** @test */
    public function steps_form_updates_record()
    {
        $step = Step::factory()->create();

        Livewire::test(StepsForm::class)
            ->emit('wantsEditStep', $step)
            ->set('fields.name', 'New name')
            ->set('fields.description', 'New description')
            ->call('update')
            ->assertEmitted('stepSaved')
            ->assertDispatchedBrowserEvent('hideStepModal')
            ;

        $this->assertDatabaseHas('steps', [
            'name' => 'New name',
            'description' => 'New description',
        ]);
    }
}
