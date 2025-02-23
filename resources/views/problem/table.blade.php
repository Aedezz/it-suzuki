@forelse ($problems as $index => $problem)
    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100">
        <td class="px-4 py-2 border-b text-center">{{ $loop->iteration }}</td>
        <td class="px-4 py-2 border-b text-center">{{ $problem->kategori ?? '-' }}</td>
        <td class="px-4 py-2 border-b text-center">
            {{ $problem->down ? \Carbon\Carbon::parse($problem->down)->format('d M Y H:i') : '-' }}
        </td>
        <td class="px-4 py-2 border-b text-center">
            {{ $problem->up ? \Carbon\Carbon::parse($problem->up)->format('d M Y H:i') : '-' }}
        </td>
       <td class="px-4 py-2 border-b text-center whitespace-nowrap">{{ $problem->pic ?? '-' }}</td>
        <td class="px-4 py-2 border-b text-center">{{ $problem->informasi ?? '-' }}</td>
        <td class="px-4 py-2 border-b text-center">{{ $problem->nama_cabang ?? '-' }}</td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="px-4 py-2 text-center text-gray-500">No data found</td>
    </tr>
@endforelse
