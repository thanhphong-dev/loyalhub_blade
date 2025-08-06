<div class="modal modal-lg fade mr-0" id="customer-appointment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('view.button.calendar') }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body px-4">
                <div class="row gy-2">
                    <input type="hidden" id="calendar-id" name="customer_id">
                    <div class="col-12">
                        <label for="title" class="form-label">
                            {{ __('view.customer_appointment.title') }}
                        </label>
                        <input type="text" class="form-control" id="" name="title" placeholder="">
                        <small class="text-danger error-status"></small>
                    </div>
                    <div class="col-xl-6 col-12">
                        <label for="title" class="form-label">
                            {{ __('view.customer_appointment.start_time') }}
                        </label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-time-line"></i>
                                </div>
                                <input type="text" class="form-control" id="timepikcr" placeholder="Choose time">
                            </div>
                        </div>
                        <small class="text-danger error-status"></small>
                    </div>
                    <div class="col-xl-6 col-12">
                        <label for="title" class="form-label">
                            {{ __('view.customer_appointment.end_time') }}
                        </label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-time-line"></i>
                                </div>
                                <input type="text" class="form-control" id="timepikcr" placeholder="Choose time">
                            </div>
                        </div>
                        <small class="text-danger error-status"></small>
                    </div>
                    <div class="col-12">
                        <label for="title" class="form-label">
                            {{ __('view.customer_appointment.date') }}
                        </label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                <input type="text" class="form-control" id="date" placeholder="Choose date">
                            </div>
                        </div>
                        <small class="text-danger error-status"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        {{ __('view.button.cancel') }}
                    </button>
                    <button type="submit" class="btn btn-purple">
                        {{ __('view.button.confirm') }}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
