const openModalBtn = document.getElementById('open-modal');
const modal = document.getElementById('modal');
const closeModalBtn = document.getElementById('close-modal');
const smallOpenModalBtn = document.getElementById('open-modal-small')

openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

smallOpenModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

if (modal?.dataset.openonError === "1") {
    modal.style.display = "block";
}

const optionsBtn = document.getElementById('more-options-btn');
const options = document.getElementById('more-options');

optionsBtn.addEventListener("click", () => {
    options.classList.toggle("hidden");
});