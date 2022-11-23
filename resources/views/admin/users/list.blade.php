<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
        <th width="25%">Name</th>
        <th width="30%">Email ID</th>
        <th width="20%">Mobile Number</th>
        <th width="10%">Status</th>
        <th width="10%">
            <center>Action</center>
        </th>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr class="delete-{{ $user->id }}">
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>({{ $user->dial_code ?? 91 }}) {{ $user->mobile_number }}</td>
                <td>
                    <center>
                        @if (Auth::user()->id != $user->id)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="user-{{ $user->id }}" {{ $user->status == 'Active' ? 'checked' : '' }}
                                    onclick="changeStatus(event.target, {{ $user->id }});">
                                <label class="form-check-label" for="user-{{ $user->id }}"></label>
                            </div>
                            <span class="status-msg-{{ $user->id }}"></span>
                        @else
                            {{ $user->status }}
                        @endif
                    </center>
                </td>

                <td>
                    <center>
                        <a href="{{ route('admin.users.show', $user->id) }}" title="View"
                            class="btn btn-xs btn-dark view"><i class="fas fa-eye"></i></a>

                        <a href="{{ route('admin.users.edit', $user->id) }}" title="Edit"
                            class="btn btn-xs btn-primary mx-2"><i class="fas fa-edit"></i></a>

                        @if (Auth::user()->id != $user->id)
                            <a href="javascript:;" title="Delete" data-id="{{ $user->id }}"
                                data-url="{{ route('admin.users.destroy', $user->id) }}"
                                class="btn btn-xs btn-danger delete"><i class="fas fa-trash"></i></a>
                        @endif
                    </center>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No data found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{!! $users->links('pagination::bootstrap-5') !!}
