<x-layouts.app>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            Add Company
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('companies.index') }}"
                                class="btn btn-primary float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            <x-validation-error :value="__('name')" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            <x-validation-error :value="__('email')" />
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            <x-validation-error :value="__('logo')" />
                        </div>
                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}">
                            <x-validation-error :value="__('website')" />
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
