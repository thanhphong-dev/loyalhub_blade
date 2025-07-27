<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Services\PermissionService;
use Exception;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $permissions = $this->permissionService->getPermissions();

        return view('permission.index', compact('permissions'));
    }

    public function create(PermissionRequest $request)
    {
        try {
            $data = $request->validated();
            $this->permissionService->createPermission($data);

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    public function update(PermissionRequest $request)
    {
        try {
            $data         = $request->validated();
            $permissionId = $request->input('id');

            $this->permissionService->updatePermission($permissionId, $data);

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    public function destroy(Permission $permission)
    {
        try {
            $this->permissionService->deletePermission($permission);

            return $this->success($permission, __('view.notyf.delete'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $permission, __('view.notyf.error'));
        }
    }
}
