<x-app-layout>
  <div class="mt-4 flex justify-center">
    <div class="w-3/4">
      <form action="{{ route('memo.confirm', ['id' => $memo->id]) }}" method="post">
        @csrf
        <table class="w-full bg-white">
          <tr>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              内容
            </th>
          </tr>
            
          <tr>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <textarea name="content" id="content" class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" required>{{ $memo->content }}</textarea>
              </td>
          </tr>
        </table>
        <div class="flex justify-end mt-4 mb-4">
          <button type="button" onclick="location.href='{{ route('memo.index') }}'" class="inline-flex ml-4 text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">戻る</button>
          <button type="submit" class="text-white inline-flex ml-4 bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">確認</button>
        </div>
      </form>
      
    </div>
  </div>

    
</x-app-layout>
