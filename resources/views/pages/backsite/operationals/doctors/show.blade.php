<table class="table table-bordered">
    <tr>
        <th>Specialist</th>
        <td>{{ isset($doctor->specialist->name) ? $doctor->specialist->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ isset($doctor->name) ? $doctor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Fee</th>
        <td>{{ isset($doctor->fee) ? 'IDR ' . number_format($doctor->fee) : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Photo</th>
        <td>
            <img src="
                @if ($doctor->photo) {{ Storage::url($doctor->photo) }}
                @else {{ 'N/A' }} @endif"
                alt="doctor photo" class="users-avatar-shadow" width="250">
        </td>
    </tr>
</table>
