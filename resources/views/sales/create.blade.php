<x-app-layout>
  <div class="mt-4 flex justify-center">
    <div class="w-3/4">
      <form action="{{ route('sales.store') }}" method="post">
        @csrf
        <table class="w-full bg-white">
          <tr>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              日付
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              名前
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              ナンバー(車種)
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              来店内容
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              担当
            </th>
          </tr>
            
          <tr>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <input class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2" type="datetime-local" name="receiving" id="receiving" value="" required>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <input class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2" type="text" name="name" id="name" value="" required>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <textarea name="number" id="number" class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2" required></textarea>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <textarea name="content" id="content" class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2" required></textarea>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <input class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2" type="text" name="charge" id="charge" value="" required>
              </td>
          </tr>
        </table>
        <div class="flex justify-end mt-4 mb-4">
          <button onclick="location.href='{{ route('sales.index') }}'" class="inline-flex ml-4 text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">一覧</button>
          <button type="submit" class="text-white inline-flex ml-4 bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
        </div>
      </form>
      
    </div>
  </div>

    
</x-app-layout>
