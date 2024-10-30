<?php
namespace App\Http\Repositories\Service;

use App\Models\Service\Service;
use Illuminate\Support\Facades\Auth;

class RepositoryService implements RepositoryServiceInterface
{
    public function create($data)
    {
        return Service::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'user_id' => Auth::user()->id,
        ]);
    }

    public function get()
    {
        return Service::paginate(10);
    }
    public function details($id)
    {
        return Service::findOrFail($id);
    }
}