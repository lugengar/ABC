<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Búsqueda en Tiempo Real</title>
</head>
<body>
    <form id="searchForm" onsubmit="return false;">
        <input type="text" id="searchQuery" placeholder="Buscar..." oninput="updateResults()">
        <button type="button" onclick="search()">Buscar</button>
    </form>
    <iframe id="resultsFrame" style="width: 100%; height: 300px;"></iframe>
    <script>
        function updateResults() {
    const query = document.getElementById('searchQuery').value;
    const iframe = document.getElementById('resultsFrame');
    iframe.src = `search_results.php?q=${encodeURIComponent(query)}`;
}

function navigateToPage(url) {
    window.location.href = url;
}

function search() {
    const query = document.getElementById('searchQuery').value;
    const iframe = document.getElementById('resultsFrame');
    iframe.src = `search_results.php?q=${encodeURIComponent(query)}`;
}

    </script>
</body>
</html>
