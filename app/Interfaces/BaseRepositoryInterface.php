<?php

namespace App\Interfaces;

interface BaseRepositoryInterface
{
    public function get(int $perPage);

    public function create(array $data);

    public function update(array $data);
}
