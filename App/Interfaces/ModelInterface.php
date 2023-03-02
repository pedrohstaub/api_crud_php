<?php

namespace App\Interfaces;

interface ModelInterface
{
    public function get(int $id = null);
    public function insert(object $object);
    public function update(object $object);
    public function delete(int $id);
}
