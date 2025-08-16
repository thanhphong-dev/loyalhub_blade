<?php

namespace App\Repositories;

use App\Enums\CustomerStatus;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\Customer;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class CustomerRepository implements BaseRepositoryInterface
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function get(int $perPage)
    {
        return $this->customer->query()
            ->where('status', [
                CustomerStatus::NEW,
            ])
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getContact(int $perPage)
    {
        return $this->customer->query()
            ->whereIn('status', [
                CustomerStatus::CONTACTED,
                CustomerStatus::INTERESTED,
            ])
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    /**
     * Get statuses customer by staff
     *
     * @param  int  $sraffId
     */
    public function getStatusesByStaff(int $staffId)
    {
        $statuses = Customer::where('assigned_staff_id', $staffId)
            ->select('status')
            ->distinct()
            ->pluck('status');

        return $statuses->map(function ($statusValue) {
            $enum = $statusValue instanceof CustomerStatus
                ? $statusValue
                : CustomerStatus::from((int) $statusValue);

            return [
                'value' => $enum->value,
                'label' => $enum->lable(),
            ];
        });
    }

    public function getCustomersByStatus(int $staffId, int $status, ?int $taskId = null)
    {
        // Lấy toàn bộ customer_ids đã assign trong Task có status_customer = $status
        $query = Task::where('status_customer', $status);

        // 🔹 Nếu đang edit → loại trừ task hiện tại
        if ($taskId) {
            $query->where('id', '!=', $taskId);
        }

        $assignedCustomerIds = $query->pluck('customer_ids')
            ->flatten(1)   // gộp các array
            ->unique()
            ->toArray();

        return Customer::where('assigned_staff_id', $staffId)
            ->where('status', $status)
            ->whereNotIn('id', $assignedCustomerIds)
            ->select('id', 'fullname')
            ->get();
    }

    public function create(array $data)
    {
        return $this->customer->create($data);
    }

    public function update(Model $model, array $data)
    {
        $model->fill($data);

        if ($model->isDirty()) {
            $model->save();

            return $model;
        }

        return false;
    }

    public function destroy(Model $model)
    {
        return $model->delete();
    }
}
