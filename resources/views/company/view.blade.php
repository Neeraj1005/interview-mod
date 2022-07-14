<x-layouts.app>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            Show Company
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('companies.index') }}"
                                class="btn btn-primary float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body ">
                    <p>Company Name: <strong>{{ optional($company)->name }}</strong></p>
                    <p>Company Website: <strong>{{ optional($company)->website }}</strong></p>
                    <p>Company Email: <strong>{{ optional($company)->email }}</strong></p>
                    <p>
                        <img src="{{ optional($company)->company_logo }}" alt="{{ optional($company)->name }}" width="50%">
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
