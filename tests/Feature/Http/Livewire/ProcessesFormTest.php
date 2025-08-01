<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\ProcessesForm;
use App\Models\Process;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProcessesFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function processes_form_component_render_correct_view()
    {
        Livewire::test(ProcessesForm::class)
            ->assertViewIs('livewire.processes-form');
    }

    /** @test */
    public function processes_form_prepares_for_creating_new_record()
    {
        Livewire::test(ProcessesForm::class)
            ->set('fields.name', 'New name')
            ->assertSet('fields.name', 'New name')
            ->set('fields.default', true)
            ->assertSet('fields.default', true)
            ->set('fields.description', 'New description')
            ->assertSet('fields.description', 'New description')
            ->set('is_editing', true)
            ->emit('wantsCreateProcess')
            ->assertSet('fields.name', null)
            ->assertSet('fields.default', null)
            ->assertSet('fields.description', null)
            ->assertSet('is_editing', false)
            ->assertDispatchedBrowserEvent('showProcessModal');
    }

    /** @test */
    public function processes_form_prepares_for_editing_record()
    {
        $process = Process::factory()->create();

        Livewire::test(ProcessesForm::class)
            ->emit('wantsEditProcess', $process)
            ->assertSet('process', $process)
            ->assertSet('is_editing', true)
            ->assertSet('fields.name', $process->name)
            ->assertSet('fields.description', $process->description)
            ->assertDispatchedBrowserEvent('showProcessModal');
    }

    /** @test */
    public function processes_form_create_new_record()
    {
        Livewire::test(ProcessesForm::class)
            ->emit('wantsCreateProcess')
            ->set('fields.name', 'New name')
            ->set('fields.default', true)
            ->set('fields.description', 'New description')
            ->call('store')
            ->assertEmitted('processSaved')
            ->assertDispatchedBrowserEvent('hideProcessModal');

        $this->assertDatabaseHas('processes', [
            'name' => 'New name',
            'default' => true,
            'description' => 'New description',
        ]);
    }

    /** @test */
    public function processes_form_updates_record()
    {
        $process = Process::factory()->create();

        Livewire::test(ProcessesForm::class)
            ->emit('wantsEditProcess', $process)
            ->set('fields.name', 'New name')
            ->set('fields.default', true)
            ->set('fields.description', 'New description')
            ->call('update')
            ->assertEmitted('processSaved')
            ->assertDispatchedBrowserEvent('hideProcessModal');

        $this->assertDatabaseHas('processes', [
            'name' => 'New name',
            'default' => true,
            'description' => 'New description',
        ]);
    }
}
