<x-layouts.app>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            Companies
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('companies.create') }}"
                                class="btn btn-primary float-end">Add Company</a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($companies as $company)
                                <tr>
                                    <td><img src="{{ optional($company)->company_logo }}" width="35px" /></td>
                                    <td>{{ optional($company)->name }}</td>
                                    <td>{{ optional($company)->email }}</td>
                                    <td>{{ optional($company)->website }}</td>
                                    <td><a href="{{ route('companies.show', optional($company)->id) }}"
                                            class="btn btn-link">
                                            View
                                        </a>
                                    </td>
                                    <td><a href="{{ route('companies.edit', optional($company)->id) }}"
                                            class="btn btn-link">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-link" href="#" type="submit" role="button" onclick="event.preventDefault();
                                                        if(confirm('Are you sure!')){
                                                            document.getElementById('form-delete-'+{{ $company->id }}).submit();
                                                        }
                                                    ">
                                            {{ __('Delete') }}
                                        </a>
                                        <form style="display:none" id="form-delete-{{ $company->id }}"
                                            action="{{ route('companies.destroy',$company->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                        </form> 
                                    </td>
                                </tr>
                            @empty
                                <x-table-record-not-found :colspan="7" />
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
