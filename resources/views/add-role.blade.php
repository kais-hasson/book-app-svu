<script src="https://cdn.tailwindcss.com"></script>
        <body class="bg-gray-100 p-6">
        <form id="addCategoryForm"
              class="bg-white shadow-xl rounded-2xl p-6 w-full max-w-4xl mx-auto space-y-6">
            @csrf

            {{-- First Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="role_Name" class="block font-semibold mb-1">Name:</label>
                    <input type="text" name="role_Name" id="name" required
                           class="w-full border rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#BAB49B]">
                </div>
            {{-- Submit Button --}}
            <div class="text-center pt-4">
            </div>
            <div class="text-right">
                <div class="text-right flex items-center justify-evenly">
                    <button
                        onclick="document.getElementById('dialogModal').classList.add('hidden')"
                        class="bg-red-500 text-white px-4 py-2 rounded">
                        Close
                    </button>
                    <button type="submit"
                            onclick="document.getElementById('dialogModal').classList.add('hidden')"
                            class="bg-[#D8D3BE] text-white px-6 py-2 rounded-md text-lg hover:bg-[#BAB49B] transition-all">
                        Add
                    </button>
                </div>
            </div>
            <div id="response" class="text-center text-sm text-gray-500"></div>
            </div>
        </form>
        </body>
<script src="{{  secure_asset('js/role.js') }}"></script>
