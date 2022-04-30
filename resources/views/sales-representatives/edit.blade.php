<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-blue-50 border-b border-gray-200">
            <a href="{{ route('sales-representatives.index') }}">
                <span class="bg-blue-500 text-blue-50 px-3 py-2">Sales Representatives List</span>
            </a>

            <h1 class="mt-6 font-bold">Edit {{ $salesRepresentative->full_name }}</h1>

            <form action="{{ route('sales-representatives.update', $salesRepresentative) }}" method="POST"
                  class="mt-6 flex flex-col space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="full_name">Full Name</label>

                    <input
                        id="full_name"
                        name="full_name"
                        type="text"
                        class="border"
                        value="{{ old('full_name') ?: $salesRepresentative->full_name }}"
                    >

                    @error('full_name')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email">Email</label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="border"
                        value="{{ old('email') ?: $salesRepresentative->email }}"
                    >

                    @error('email')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="telephone">Telephone</label>

                    <input
                        id="telephone"
                        name="telephone"
                        type="text"
                        class="border"
                        value="{{ old('telephone') ?: $salesRepresentative->telephone }}"
                    >

                    @error('telephone')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="joined_date">Joined Date</label>

                    <input
                        id="joined_date"
                        name="joined_date"
                        type="date"
                        class="border"
                        value="{{ old('joined_date') ?: $joinedDate }}"
                    >

                    @error('joined_date')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="route">Route</label>

                    <select id="route" name="route" required>
                        <option selected disabled value="">Select Route</option>

                        @foreach ($routes as $routeKey => $route)
                            <option value="{{ $routeKey }}"
                                    @if($routeKey == old('route') || $routeKey == $salesRepresentative->route) selected @endif>
                                {{ $route }}
                            </option>
                        @endforeach
                    </select>

                    @error('route')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="comments">Comments</label>

                    <textarea
                        id="comments"
                        name="comments"
                        class="border"
                    >{{ old('comments') ?: $salesRepresentative->comments }}</textarea>

                    @error('comments')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 rounded text-blue-50 inline-block">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
