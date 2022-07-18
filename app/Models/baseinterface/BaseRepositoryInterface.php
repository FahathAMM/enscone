<?php

namespace App\Models\baseinterface;

interface BaseRepositoryInterface
{
    public function getAll();

    public function findOrFail($id);

    public function search($q);

    public function paginate($page = 20);

    public function createWithAlertMessage($collection, $alertMessage);

    // public function getUserById($id);

    // public function createOrUpdate($id = null, $collection = []);

    // public function deleteUser($id);
}
