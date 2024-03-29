<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class AgentLogin extends Model
{
    use Searchable;

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
