<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Service\ServiceRepository;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service\Service;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

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

    public function edit($id)
    {
        $service = $this->repositoryService->details($id);

        return view('service.edit', ['service' => $service]);
    }
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validated = $request->validated();
    
        try {
            $this->repositoryService->update($validated, $service->id);
            return redirect()->route('service.index')->with('success', 'Service updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the service.');
        }
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
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the service.');
        }
    }
}
