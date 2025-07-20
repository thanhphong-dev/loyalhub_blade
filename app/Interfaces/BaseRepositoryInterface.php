<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function get(int $perPage);

    public function create(array $data);

    public function update(Model $model, array $data);

    public function destroy(Model $model);
}
