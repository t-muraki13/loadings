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

const select = document.getElementById('sort');
select.addEventListener('change', function() {
this.form.submit();
});

const pagination = document.getElementById('pagination');
pagination.addEventListener('change', function() {
this.form.submit();
});