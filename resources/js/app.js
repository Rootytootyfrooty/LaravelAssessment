//
const editBtn = document.getElementById('edit-btn');
const editModal = document.getElementById('edit-modal');
const cancelEdit = document.getElementById('cancel-edit');

editBtn.addEventListener("click", () => {
    editModal.style.display = "block";
});
cancelEdit.addEventListener("click", () => {
    editModal.style.display = "none";
});