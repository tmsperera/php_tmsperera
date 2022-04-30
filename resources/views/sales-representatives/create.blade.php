<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-blue-50 border-b border-gray-200">
            <h1 class="font-bold">Create Sales Representative</h1>

            <form method="POST" action="{{ route('sales-representatives.store') }}"
                  class="mt-6 flex flex-col space-y-4">
                @csrf

                <div>
                    <label for="full_name">Full Name</label>

                    <input
                        id="full_name"
                        name="full_name"
                        type="text"
                        class="border"
                        value="{{ old('full_name') }}"
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
                        value="{{ old('email') }}"
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
                        value="{{ old('telephone') }}"
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
                        value="{{ old('joined_date') }}"
                    >

                    @error('joined_date')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="comments">Comments</label>

                    <textarea
                        id="comments"
                        name="comments"
                        class="border"
                    >{{ old('comments') }}</textarea>

                    @error('comments')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 rounded text-blue-50 inline-block">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
