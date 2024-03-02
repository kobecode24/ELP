function toggleDropdown(dropdownId) {
    const element = document.getElementById(dropdownId);
    element.classList.toggle("hidden");
}
function openModal() {
    document.getElementById('addChapterModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('addChapterModal').style.display = 'none';
}
