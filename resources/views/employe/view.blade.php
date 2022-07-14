<x-layouts.app>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            Show Employee
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('employees.index') }}"
                                class="btn btn-primary float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body ">
                    <p>Employee Name: <strong>{{ optional($employee)->full_name }}</strong></p>
                    <p>Employee Email: <strong>{{ optional($employee)->email }}</strong></p>
                    <p>Employee Website: <strong>{{ optional($employee)->phone }}</strong></p>
                    <p>Employee Company: <strong>{{ optional($employee->company)->name }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
