<x-app-layout>
<x-flash-message status="session('status')" />
  <div class="mt-4 flex justify-center">
    <div class="w-6/7">
      <form action="{{ route('sales.update', ['id' => $sales->id]) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="receiving" value="{{ $receiving }}">
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="nameKana" value="{{ $nameKana }}">
        <input type="hidden" name="number" value="{{ $number }}">
        <input type="hidden" name="content" value="{{ $content }}">
        <input type="hidden" name="charge" value="{{ $charge }}">

        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                日付
              </th>
              <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                名前
              </th>
              <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                名前(カナ)
              </th>
              <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                ナンバー(車種)
              </th>
              <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                修理内容
              </th>
              <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
                担当
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                    {{ $receiving }}
                </td>
                <td class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                    {{ $name }}              
                </td>
                <td class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                    {{ $nameKana }}              
                </td>
                <td class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                    {{ $number }}
                </td>
                <td class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                    {{ $content }}
                </td>
                <td class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                    {{ $charge }}
                </td>
            </tr>
          </tbody>
        </table>
        <div class="flex justify-end mt-4 mb-4">
          <button type="button" onclick="location.href='{{ route('sales.edit', ['id' => $sales->id]) }}'" class="inline-flex text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">戻る</button>
          <button type="submit" class="inline-flex ml-4 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">更新</button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
