<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Services\RoleService;
use Exception;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAllRole();

        return view('role.index', compact('roles'));
    }

    public function create(RoleRequest $roleRequest)
    {
        try {
            $data = $roleRequest->validated();
            $this->roleService->createRole($data);

            return $this->success($data, __('view.notyf.success'));
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($data, __('view.notyf.error'));
        }
    }

    public function update(RoleRequest $roleRequest)
    {
        try {
            $role = $roleRequest->id();
            $data = $roleRequest->validated();

            $this->roleService->updateRole($role, $data);
            notyf(__('view.notyf.success'));

            return redirect()->back();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            notyf()->error(__('view.notyf.error'));

            return redirect()->back();
        }
    }

    public function destroy(Role $role)
    {
        //
    }
}
