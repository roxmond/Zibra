function showForm() {
    document.getElementById("form-section").style.display = "block";
    document.getElementById("search-section").style.display = "none";
    document.getElementById("results-section").style.display = "none";
}

function showSearch() {
    document.getElementById("form-section").style.display = "none";
    document.getElementById("search-section").style.display = "block";
    document.getElementById("results-section").style.display = "none";
}
function showResults() {
    document.getElementById("form-section").style.display = "none";
    document.getElementById("search-section").style.display = "none";
    document.getElementById("results-section").style.display = "block";
}