<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ route('sales-representatives.create') }}">
                <span class="bg-blue-500 text-blue-50 px-3 py-2">Add Sales Representatives</span>
            </a>

            <table class="mt-6 table-auto">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Route</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($salesRepresentatives as $salesRep)
                    <tr title="{{ $salesRep->created_at }}">
                        <td>{{ $salesRep->id }}</td>
                        <td>{{ $salesRep->full_name }}</td>
                        <td>{{ $salesRep->email }}</td>
                        <td>{{ $salesRep->telephone }}</td>
                        <td>{{ $salesRep->route }}</td>
                        <td>
                            <a href="{{ route('sales-representatives.show', $salesRep) }}" role="button"
                               class="btn btn-sm btn-light" title="Edit">
                                Show
                            </a>

                            <a href="{{ route('sales-representatives.edit', $salesRep) }}" role="button"
                               class="btn btn-sm btn-light" title="Edit">
                                Edit
                            </a>

                            <button class="btn btn-sm btn-light" title="Delete" type="submit"
                                    form="delete-form-{{$salesRep->id}}">
                                Delete
                            </button>

                            <form id="delete-form-{{$salesRep->id}}" method="post"
                                  action="{{route('sales-representatives.destroy', $salesRep)}}"
                                  onsubmit="return confirm('Do you really want to delete?');">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
