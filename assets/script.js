function showCategories(data){
    const ul = document.createDocumentFragment();

    for (const key in data.category) {
        const li = document.createElement('li');

        sHtml = `<a class="dropdown-item" href='index.php?category="${data.category[key]}"'>${data.category[key]}</a>`;
        li.innerHTML = sHtml;

        ul.appendChild(li);
    }

    document.getElementById("dw").appendChild(ul);
}
fetch("data/category.json")
    .then(response => response.json())
    .then(data => showCategories(data));