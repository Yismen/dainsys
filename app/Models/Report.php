<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'key', 'active', 'description'];

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * The recipients that belong to the Report
     */
    public function recipients(): BelongsToMany
    {
        return $this->belongsToMany(Recipient::class);
    }

    public function mailableRecipients(): array
    {
        throw_unless($this->active, new \Exception('Report '.$this->name.' is inactive!', 403));

        $recipients = $this->recipients()->pluck('email', 'name')->all();

        throw_if(empty($recipients), new \Exception('Report '.$this->name.' has no recipients assigned. Please assign some!', 403));

        return $recipients;
    }
}
