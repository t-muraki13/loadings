<x-app-layout>
<x-flash-message status="session('status')" />

  <form action="{{ route('index') }}" method="get">
    <div class="lg:flex lg:justify-end items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div>
        <span class="text-sm">日付検索</span>
        <div class="lg:flex items-center space-x-2">
          <input type="date" name="date" id="date" value="{{ request('date') }}">
        </div>
      </div>
      <!-- <div class="ml-2">
        <span class="text-sm">名前検索</span>
        <div class="lg:flex items-center space-x-2">
          <input type="text" name="name" id="name" value="{{ request('name') }}">
        </div>
      </div>
      <div class="ml-2">
        <span class="text-sm">名前(カナ)検索</span>
        <div class="lg:flex items-center space-x-2">
          <input type="text" name="nameKana" id="nameKana" value="{{ request('nameKana') }}">
        </div>
      </div>
      <div class="ml-2">
        <span class="text-sm">ナンバー検索</span>
        <div class="lg:flex items-center space-x-2">
          <input type="text" name="number" id="number" value="{{ request('number') }}">
        </div>
      </div> -->
      <div class="ml-2">
        <span class="text-sm">検索</span>
        <div class="lg:flex items-center space-x-2">
          <input type="text" name="query" id="query" value="{{ request('query') }}" placeholder="名前、名前(カナ)、ナンバー検索" class="w-80">
        </div>
      </div>
      <div class="flex space-x-4 items-center mt-6 ml-2">
        <div class="items-center">
          <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">検索</button>
        </div>
      </div>
      <div class="lg:flex ml-8">
        <div>
          <span class="text-sm">表示順</span>
          <br>
          <select name="sort" id="sort"  class="mr-4">
            <option value="{{ \App\Constants\Common::SORT_ORDER['receiving'] }}" 
              @if(\Request::get('sort') === \App\Constants\Common::SORT_ORDER['receiving'])
                  selected
                  @endif>
                  入庫日順
            </option>
            <option value="{{ \App\Constants\Common::SORT_ORDER['name'] }}" 
              @if(\Request::get('sort') === \App\Constants\Common::SORT_ORDER['name'])
                  selected
                  @endif>
                  名前順
            </option>
            <option value="{{ \App\Constants\Common::SORT_ORDER['charge'] }}" 
              @if(\Request::get('sort') === \App\Constants\Common::SORT_ORDER['charge'])
                  selected
                  @endif>
                  担当者順
            </option>
            <option value="{{ \App\Constants\Common::SORT_ORDER['issue'] }}" 
              @if(\Request::get('sort') === \App\Constants\Common::SORT_ORDER['issue'])
                  selected
                  @endif>
                  出庫日順
            </option>
            <option value="{{ \App\Constants\Common::SORT_ORDER['place'] }}" 
              @if(\Request::get('sort') === \App\Constants\Common::SORT_ORDER['place'])
                  selected
                  @endif>
                  入庫場所順
            </option>
          </select>
        </div>
        <div class="ml-4">
          <span class="text-sm">表示件数</span>
          <br>
          <select name="pagination" id="pagination">
            <option value="5" @if(\Request::get('pagination') === '5') selected @endif>
              5件
            </option>
            <option value="10" @if(\Request::get('pagination') === '10') selected @endif>
              10件
            </option>
            <option value="20" @if(\Request::get('pagination') === '20') selected @endif>
              20件
            </option>
          </select>
        </div>
      </div>
    </div>
  </form>
  
  
  <div class="mt-4 flex justify-center">
    <div class="w-11/12">
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
              名前(カナ)
            </th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              ナンバー
            </th>
            <th class="px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700">
              修理内容
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
            @php
                $isPending = strpos($load->content, '待ち') !== false;
                $isPlace = strpos($load->place, '品川') !== false;
                $isDelivery = strpos($load->remarks, 'WS') !== false || strpos($load->remarks, 'SC') !== false;
            @endphp
          <tr class="transition-colors duration-300">
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }}  {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  <button type="button" onclick="location.href='{{ route('edit', ['id' => $load->id])}}'" class="inline-flex ml-4 mb-2 text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">編集</button>
                  <button id="toggle-button-{{ $load->id }}" type="button" class="inline-flex ml-4 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" onclick="toggleComplete('{{ $load->id }}')">完了</button>
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->receiving }}
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->name }}              
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->nameKana }}              
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->number }}
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->content }}
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->charge }}
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->issue }}
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->remarks }}
              </td>
              <td class="row-{{ $load->id }} px-4 py-2 w-1/12 font-semibold text-base text-gray-700 bg-gray-100 border border-gray-700 text-center {{ $isPending ? 'bg-red-100' : 'bg-gray-100' }} {{ $isPlace ? 'bg-green-100' : 'bg-gray-100' }} {{ $isDelivery ? 'bg-blue-100' : 'bg-gray-100' }}">
                  {{ $load->place }}
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $loading->appends([
        'sort' => \Request::get('sort'),
        'pagination' => \Request::get('pagination')
      ])->links() }}
      <div class="flex justify-end mt-4 mb-4">
        <button type="button" onclick="location.href='{{ route('create') }}'" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/index.js') }}"></script>
  <script src="{{ asset('js/pagination.js') }}"></script>
</x-app-layout>
