<?php
namespace App\Http\Repositories\Service;

interface ServiceRepositoryInterface
{
    public function create($data);
    public function get();
    public function details($id);
    public function update($data, $id);

}