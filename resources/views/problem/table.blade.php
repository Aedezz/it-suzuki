@forelse ($problems as $index => $problem)
    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
        <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
        <td class="px-4 py-2 border-b">{{ $problem->kategori }}</td>
        <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($problem->down)->format('d M Y H:i') }}</td>
        <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($problem->up)->format('d M Y H:i') }}</td>
        <td class="px-4 py-2 border-b">{{ $problem->pic }}</td>
        <td class="px-4 py-2 border-b">{{ $problem->informasi }}</td>
        <td class="px-4 py-2 border-b">{{ $problem->nama_cabang }}</td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="px-4 py-2 text-center text-gray-500">No data found</td>
    </tr>
@endforelse
