<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    public function getAll()
    {
        return Module::all();
    }

    public function getById($id)
    {
        return Module::with('users')->findOrFail($id);
    }
}
