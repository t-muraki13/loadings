<x-app-layout>
<x-flash-message status="session('status')" />
  <div class="mt-4 flex justify-center">
    
    <div class="w-6/7">
      <table class="min-w-full bg-white mb-4">
        <thead>
          <tr>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700"></th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              日付
            </th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              名前
            </th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              ナンバー
            </th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              担当
            </th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              出庫日
            </th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              備考
            </th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              入庫場所
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($loading as $load)
          <tr class="transition-colors duration-300" id="row-{{ $load->id }}">
              <td name="row-{{ $load->id }}" class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                  <button type="button" onclick="location.href='{{ route('edit', ['id' => $load->id])}}'" class="inline-flex ml-4 mb-2 text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">編集</button>
                  <button id="toggle-button-{{ $load->id }}" type="button" class="inline-flex ml-4 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" onclick="toggleComplete('{{ $load->id }}')">完了</button>
              </td>
              <td name="row-{{ $load->id }}" class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                  {{ $load->receiving }}
              </td>
              <td name="row-{{ $load->id }}" class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                  {{ $load->name }}              
              </td>
              <td name="row-{{ $load->id }}" class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                  {{ $load->number }}
              </td>
              <td name="row-{{ $load->id }}" class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                  {{ $load->charge }}
              </td>
              <td name="row-{{ $load->id }}" class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                  {{ $load->issue }}
              </td>
              <td name="row-{{ $load->id }}" class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                  {{ $load->remarks }}
              </td>
              <td name="row-{{ $load->id }}" class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center">
                  {{ $load->place }}
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $loading->links() }}
      <div class="flex justify-end mt-4 mb-4">
        <button type="button" onclick="location.href='{{ route('create') }}'" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
      </div>
    </div>
  </div>
  <script>
  function toggleComplete(id) {
      const rows = document.getElementsByName('row-' + id);
      const button = document.getElementById('toggle-button-' + id);
    
      for (let i = 0; i < rows.length; i++) {
          if (button.innerText === '完了') {
              rows[i].classList.add('bg-gray-400'); // グレーに変更
          } else {
              rows[i].classList.remove('bg-gray-400'); // 背景色をリセット
          }
      }
    
      if (button.innerText === '完了') {
          // 行をグレーアウトする
          button.innerText = '戻す'; // ボタンのテキストを「戻す」に変更
          button.classList.remove('bg-red-500'); // 背景色を変更
          button.classList.add('bg-gray-500'); // グレーに変更
      } else {
          // 行の背景色を元に戻す
          button.innerText = '完了'; // ボタンのテキストを「完了」に変更
          button.classList.remove('bg-gray-500'); // 背景色を変更
          button.classList.add('bg-red-500'); // 元の色に戻す
      }
  }
  </script>
    
</x-app-layout>
