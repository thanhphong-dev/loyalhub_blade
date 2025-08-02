<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Services\PermissionService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Return view index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $permissions = $this->permissionService->getPermissions();

        return view('permission.index', compact('permissions'));
    }

    /**
     * Create permission
     *
     * @param  \App\Http\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(PermissionRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $this->permissionService->createPermission($data);

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Update permission
     *
     * @param  \App\Http\Requests\PermissionRequest  $request
     * @return JsonResponse
     */
    public function update(PermissionRequest $request): JsonResponse
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

    /**
     * Destroy permission
     *
     * @param  \App\Models\Permission  $permission
     * @return JsonResponse
     */
    public function destroy(Permission $permission): JsonResponse
    {
        try {
            $this->permissionService->deletePermission($permission);

            return $this->success($permission, __('view.notyf.delete'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $permission, __('view.notyf.error'));
        }
    }
}
