<x-layouts.app>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            Add Employe
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('employees.index') }}"
                                class="btn btn-primary float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
                            <x-validation-error :value="__('first_name')" />
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                            <x-validation-error :value="__('last_name')" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            <x-validation-error :value="__('email')" />
                        </div>
                        <div class="mb-3">
                            <label for="company_id" class="form-label">Company</label>
                            <select name="company_id" id="company_id" class="form-select">
                                <option value="0">Select Company</option>
                                @forelse ($company as $com)
                                    <option value="{{ $com->id }}">{{ $com->name }}</option>
                                @empty
                                    <option value="">{{ __('Company Not Found') }}</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            <x-validation-error :value="__('phone')" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
