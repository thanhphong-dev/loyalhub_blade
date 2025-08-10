<div class="modal modal-lg fade mr-0" id="customer-appointments" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('view.button.calendar') }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body px-4">
                <div class="row gy-2">
                    <input type="hidden" id="calendar-id" name="calendar_id">
                    <div class="col-12">
                        <label for="title" class="form-label">
                            {{ __('view.customer_appointment.title') }}
                        </label>
                        <input type="text" class="form-control" id="" name="title" placeholder="">
                        <small class="text-danger error-title"></small>
                    </div>
                    <div class="col-12">
                        <label for="customer_id" class="form-label">
                            {{ __('view.customer_appointment.customer') }}
                        </label>
                        <select name="customer_id" class="form-control" id="select-customer">
                        </select>
                        <small class="text-danger error-customer_id"></small>
                    </div>
                    <div class="col-xl-6 col-12">
                        <label for="start_time" class="form-label">
                            {{ __('view.customer_appointment.start_time') }}
                        </label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-time-line"></i>
                                </div>
                                <input type="text" class="form-control" name="start_time" id="start_time"
                                    placeholder="{{ __('view.placeholder.start_time') }}">
                            </div>
                        </div>
                        <small class="text-danger error-start_time"></small>
                    </div>
                    <div class="col-xl-6 col-12">
                        <label for="end_time" class="form-label">
                            {{ __('view.customer_appointment.end_time') }}
                        </label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-time-line"></i>
                                </div>
                                <input type="text" class="form-control" name="end_time" id="end_time"
                                    placeholder="{{ __('view.placeholder.end_time') }}">
                            </div>
                        </div>
                        <small class="text-danger error-end_time"></small>
                    </div>
                    <div class="col-12">
                        <label for="date" class="form-label">
                            {{ __('view.customer_appointment.date') }}
                        </label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                <input type="text" class="form-control" name="date" id="date"
                                    placeholder="{{ __('view.placeholder.date_appointment') }}">
                            </div>
                        </div>
                        <small class="text-danger error-date"></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex">
                <button type="submit" class="btn btn-danger" id="delte-customer-appointments">
                    {{ __('view.button.delete') }}
                </button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    {{ __('view.button.cancel') }}
                </button>
                <button type="submit" class="btn btn-purple" id="save-appointment">
                    {{ __('view.button.confirm') }}
                </button>
            </div>
        </div>
    </div>
</div>
