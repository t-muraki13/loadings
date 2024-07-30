<x-app-layout>
  <div class="mt-4 flex justify-center">
    <div class="w-3/4">
      <form action="{{ route('confirm', ['id' => $loading->id]) }}" method="post">
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
              名前(カナ)
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              ナンバー
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              修理内容
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              担当
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              出庫日
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              備考
            </th>
            <th class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              入庫場所
            </th>
          </tr>
            
          <tr>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <input class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" type="datetime-local" name="receiving" id="receiving" value="{{ $loading->receiving }}" required>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <input class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" type="text" name="name" id="name" value="{{ $loading->name }}" required>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <input class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" type="text" name="nameKana" id="nameKana" value="{{ $loading->nameKana }}" required>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <textarea name="number" id="number" class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" required>{{ $loading->number }}</textarea>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <textarea name="content" id="content" class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" required>{{ $loading->content }}</textarea>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <input class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" type="text" name="charge" id="charge" value="{{ $loading->charge }}" required>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <input class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" type="datetime-local" name="issue" id="issue" value="{{ $loading->issue }}" required>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <textarea name="remarks" id="remarks" class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" required>{{ $loading->remarks }}</textarea>
              </td>
              <td class="px-4 py-2 w-1/7 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                  <textarea name="place" id="place" class="w-full bg-gray-100 focus:outline-none focus:bg-white border border-none rounded-md px-3 py-2 mt-2 text-center" required>{{ $loading->place }}</textarea>
              </td>
          </tr>
        </table>
        <div class="flex justify-end mt-4 mb-4">
          <button type="button" onclick="location.href='{{ route('index') }}'" class="inline-flex ml-4 text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">戻る</button>
          <button type="submit" class="text-white inline-flex ml-4 bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">確認</button>
        </div>
      </form>
      
    </div>
  </div>
</x-app-layout>
