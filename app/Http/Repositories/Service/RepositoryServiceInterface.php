<?php
namespace App\Http\Repositories\Service;

interface RepositoryServiceInterface
{
    public function create($data);
    public function get();
    public function details($id);
}