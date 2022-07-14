<x-layouts.app>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            Employees
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('employees.create') }}"
                                class="btn btn-primary float-end">Add Employe</a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $emp)
                                <tr>
                                    <td>{{ optional($emp)->full_name }}</td>
                                    <td>{{ optional($emp)->email }}</td>
                                    <td>{{ optional($emp->company)->name }}</td>
                                    <td>{{ optional($emp)->phone }}</td>
                                    <td><a href="{{ route('employees.show', optional($emp)->id) }}"
                                            class="btn btn-link">
                                            View
                                        </a>
                                    </td>
                                    <td><a href="{{ route('employees.edit', optional($emp)->id) }}"
                                            class="btn btn-link">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-link" href="#" type="submit" role="button" onclick="event.preventDefault();
                                                        if(confirm('Are you sure!')){
                                                            document.getElementById('form-delete-'+{{ $emp->id }}).submit();
                                                        }
                                                    ">
                                            {{ __('Delete') }}
                                        </a>
                                        <form style="display:none" id="form-delete-{{ $emp->id }}"
                                            action="{{ route('employees.destroy',$emp->id) }}"
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
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
