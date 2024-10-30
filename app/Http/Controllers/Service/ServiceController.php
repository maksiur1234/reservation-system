<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Service\ServiceRepository;
use App\Http\Requests\Service\StoreServiceRequest;
use Exception;

class ServiceController extends Controller
{
    protected $repositoryService;
    public function __construct(ServiceRepository $repositoryService)
    {
        $this->repositoryService = $repositoryService;
    }
    public function view()
    {
        $services = $this->repositoryService->get();

        return view('service.index', ['services' => $services]);
    }

    public function details($id)
    {
        $service = $this->repositoryService->details($id);

        return view('service.details', ['service' => $service]);
    }

    public function viewCreate()
    {
        return view('service.create');
    }

    public function store(StoreServiceRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->repositoryService->create($validated);
    
            return redirect()->route('services')->with('success', 'Service created successfully.');
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
