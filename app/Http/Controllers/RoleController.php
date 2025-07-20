<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Services\RoleService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Return view index
     *
     * @return View
     */
    public function index(): View
    {
        $roles = $this->roleService->getAllRole();

        return view('role.index', compact('roles'));
    }

    /**
     * Create Role
     *
     * @param  \App\Http\Requests\RoleRequest  $roleRequest
     * @return JsonResponse
     */
    public function create(RoleRequest $roleRequest): JsonResponse
    {
        try {
            $data = $roleRequest->validated();
            $this->roleService->createRole($data);

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Update Role
     *
     * @param  \App\Http\Requests\RoleRequest  $roleRequest
     * @return JsonResponse
     */
    public function update(RoleRequest $roleRequest): JsonResponse
    {
        try {
            $roleId = $roleRequest->input('id');
            $data   = $roleRequest->validated();

            $this->roleService->updateRole($roleId, $data);

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), null, __('view.notyf.error'));
        }
    }

    /**
     * Destroy role
     *
     * @param  \App\Models\Role  $role
     * @return JsonResponse
     */
    public function destroy(Role $role): JsonResponse
    {
        try {
            $this->roleService->deleteRole($role);

            return $this->success($role, __('view.notyf.delete'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), null, __('view.notyf.error'));
        }
    }
}
