<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
        <th width="35%">Image</th>
        <th width="15%" class="custom-sorting" id="sort-created_at" data-sort-field="created_at" data-sort-value="ASC">Date</th>
        <th width="10%" class="custom-sorting" id="sort-file_size" data-sort-field="file_size" data-sort-value="ASC">Size</th>
        <th width="25%">User Restrict</th>
        <th width="10%">Status</th>
        <th width="5%">
            <center>Action</center>
        </th>
    </thead>
    <tbody>
        @forelse($RS_Results as $RS_Row)
            <tr class="delete-{{ $RS_Row->id }}">
                <td>
                    @if (!empty($RS_Row->file_path))
                        <img src="{{ config('app.url') . Storage::url('app/public/' . $RS_Row->file_path) }}"
                            alt="{{ $RS_Row->file_name }}" class="gallery-img" />
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($RS_Row->created_at)->format('d-m-Y') }}</td>
                <td>{{ $RS_Row->file_size }}</td>
                <td>
                    <div class="form-group-radio">
                        <div class="icheck-success d-inline mr-3">
                            <input type="radio" id="permission_active_{{ $RS_Row->id }}"
                                name="permission_{{ $RS_Row->id }}" value="1"
                                {{ $RS_Row->permission == '1' ? 'checked' : '' }} class="permission"
                                data-id="{{ $RS_Row->id }}" data-url="{{ route('admin.galleries.permission') }}">
                            <label for="permission_active_{{ $RS_Row->id }}">General</label>
                        </div>
                        <div class="icheck-danger d-inline">
                            <input type="radio" id="permission_deactivate_{{ $RS_Row->id }}"
                                name="permission_{{ $RS_Row->id }}" value="0"
                                {{ $RS_Row->permission == '0' ? 'checked' : '' }} class="permission"
                                data-id="{{ $RS_Row->id }}" data-url="{{ route('admin.galleries.permission') }}">
                            <label for="permission_deactivate_{{ $RS_Row->id }}">Restrict</label>
                        </div>
                    </div>
                    <span class="permission-msg-{{ $RS_Row->id }}"></span>
                </td>
                <td>
                    <center>
                        <div class="form-check form-switch">
                            <input class="form-check-input status" type="checkbox" role="switch"
                                id="user-{{ $RS_Row->id }}" {{ $RS_Row->status == 'Active' ? 'checked' : '' }}
                                data-id="{{ $RS_Row->id }}" data-url="{{ route('admin.galleries.change.status') }}">
                            <label class="form-check-label" for="user-{{ $RS_Row->id }}"></label>
                        </div>
                        <span class="status-msg-{{ $RS_Row->id }}"></span>
                    </center>
                </td>

                <td>
                    <center>
                        <a href="javascript:;" title="Delete" data-toggle="modal" data-target="#ajaxModelDelete" data-title="Gallery Image" data-id="{{ $RS_Row->id }}"
                            data-url="{{ route('admin.galleries.destroy', $RS_Row->id) }}"
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

{!! $RS_Results->onEachSide(1)->links('pagination::bootstrap-5') !!}
