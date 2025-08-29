const input = document.getElementById('searchInput');
const suggestList = document.getElementById('suggestList');

let products = [];

// JSON読み込み → 完了後にイベント登録
fetch('products.json')
  .then(response => response.json())
  .then(data => {
    products = data;

    // 入力欄クリック時とフォーカス時(tabキー押下)にサジェスト表示
    input.addEventListener('input', showSuggestions);
    input.addEventListener('focus', showSuggestions);
  });

function showSuggestions() {
  if (products.length === 0) return; // データ未読み込みなら何もしない

  const query = input.value.trim();
  suggestList.innerHTML = '';

  let matches = [];
  if (query.length === 0) {
    matches = products.slice(0, 5); // 空なら全件
  } else {
    matches = products.filter(item =>
      item.name.includes(query)
    ).slice(0, 5);
  }

  if (matches.length > 0) {
    suggestList.style.display = 'block';
    matches.forEach(item => {
      const div = document.createElement('div');
      div.classList.add('suggest-item');
      div.innerHTML = `<img src="${item.image}" alt="${item.name}"><span>${item.name}</span>`;
      // div.addEventListener('click', () => {
      //   window.location.href = item.url;
      // });
      suggestList.appendChild(div);
    });
  } else {
    suggestList.style.display = 'none';
  }
}

document.addEventListener('click', (e) => {
  if (!e.target.closest('.search-box')) {
    suggestList.style.display = 'none';
  }
});
