<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
        <th width="70%">Title</th>
        <th width="10%">Date</th>
        <th width="10%">Status</th>
        <th width="10%">
            <center>Action</center>
        </th>
    </thead>
    <tbody>
        @forelse($RS_Results as $RS_Row)
            <tr class="delete-{{ $RS_Row->id }}">
                <td>{{ $RS_Row->title }}</td>
                <td>{{ $RS_Row->created_at }}</td>
                <td>
                    <center>
                        <div class="form-check form-switch">
                            <input class="form-check-input status" type="checkbox" role="switch"
                                id="user-{{ $RS_Row->id }}" {{ $RS_Row->status == 'Active' ? 'checked' : '' }}
                                data-id="{{ $RS_Row->id }}"
                                data-url="{{ route('admin.announcements.change.status') }}">
                            <label class="form-check-label" for="user-{{ $RS_Row->id }}"></label>
                        </div>
                        <span class="status-msg-{{ $RS_Row->id }}"></span>
                    </center>
                </td>

                <td>
                    <center>
                        <a href="{{ route('admin.announcements.show', $RS_Row->id) }}" title="View"
                            class="btn btn-xs btn-dark view"><i class="fas fa-eye"></i></a>

                        <a href="{{ route('admin.announcements.edit', $RS_Row->id) }}" title="Edit"
                            class="btn btn-xs btn-primary mx-2"><i class="fas fa-edit"></i></a>

                        <a href="javascript:;" title="Delete" data-toggle="modal" data-target="#ajaxModelDelete" data-title="Announcement" data-id="{{ $RS_Row->id }}"
                            data-url="{{ route('admin.announcements.destroy', $RS_Row->id) }}"
                            class="btn btn-xs btn-danger delete"><i class="fas fa-trash"></i></a>
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
