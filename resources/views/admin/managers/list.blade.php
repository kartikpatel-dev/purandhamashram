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
        @forelse($RS_Results as $RS_Row)
            <tr class="delete-{{ $RS_Row->id }}">
                <td>{{ $RS_Row->first_name }} {{ $RS_Row->last_name }}</td>
                <td>{{ $RS_Row->email }}</td>
                <td>({{ $RS_Row->dial_code ?? 91 }}) {{ $RS_Row->mobile_number }}</td>
                <td>
                    <center>
                        @if (Auth::user()->id != $RS_Row->id)
                            <div class="form-check form-switch">
                                <input class="form-check-input status" type="checkbox" role="switch"
                                    id="user-{{ $RS_Row->id }}" {{ $RS_Row->status == 'Active' ? 'checked' : '' }}
                                    data-id="{{ $RS_Row->id }}" data-url="{{ route('admin.managers.change.status') }}">
                                <label class="form-check-label" for="user-{{ $RS_Row->id }}"></label>
                            </div>
                            <span class="status-msg-{{ $RS_Row->id }}"></span>
                        @else
                            {{ $RS_Row->status }}
                        @endif
                    </center>
                </td>

                <td>
                    <center>
                        <a href="{{ route('admin.managers.show', $RS_Row->id) }}" title="View"
                            class="btn btn-xs btn-dark view"><i class="fas fa-eye"></i></a>

                        <a href="{{ route('admin.managers.edit', $RS_Row->id) }}" title="Edit"
                            class="btn btn-xs btn-primary mx-2"><i class="fas fa-edit"></i></a>

                        @if (Auth::user()->id != $RS_Row->id)
                            <a href="javascript:;" title="Delete" data-toggle="modal" data-target="#ajaxModelDelete" data-title="Manager" data-id="{{ $RS_Row->id }}"
                                data-url="{{ route('admin.managers.destroy', $RS_Row->id) }}"
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

{!! $RS_Results->links('pagination::bootstrap-5') !!}
