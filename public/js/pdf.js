// function previewPDF() {
//   window.open('{{ route("generate.pdf") }}', '_blank');
// }

// function previewPDF() {
//   window.location.href = '{{ route("generate.pdf") }}';
// }

// function previewPDF(url) {
//   window.open(url, '_blank');
// }

function previewPDF() {
  const button = document.querySelector('button[data-url]');
  const routeUrl = button.getAttribute('data-url');

  // 日付と検索クエリを取得するためのinput要素のidを指定
  const date = document.getElementById('date').value;
  const query = document.getElementById('query').value;

  // 絞り込み条件をURLに追加
  const url = `${routeUrl}?date=${encodeURIComponent(date)}&query=${encodeURIComponent(query)}`;

  console.log(url); // デバッグ用: URLを確認
  window.open(url, '_blank');

}
