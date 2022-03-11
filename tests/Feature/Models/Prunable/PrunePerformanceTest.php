<?php


namespace Tests\Feature\Models\Prunable;

use Tests\TestCase;
use App\Performance;
use Illuminate\Database\Console\PruneCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrunePerformanceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function performance_model_is_prunable()
    {
        $not_prunable = factory(Performance::class)->create(['created_at' => now()->subYear()]);
        $prunable = factory(Performance::class)->create(['created_at' => now()->subYears(4)]);

        $this->artisan(PruneCommand::class, [
            '--model' => [
                Performance::class
            ]
        ]);

        $this->assertDatabaseHas('performances', ['id' => $not_prunable->id]);
        $this->assertDatabaseMissing('performances', ['id' => $prunable->id]);
        $this->assertDatabaseCount('performances', 1);
    }
}
