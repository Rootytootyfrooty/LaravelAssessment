const openModalBtn = document.getElementById('open-modal');
const modal = document.getElementById('modal');
const closeModalBtn = document.getElementById('close-modal');
const smallOpenModalBtn = document.getElementById('open-modal-small')
//modals on: employees.index, companies.index, company/id, employee/id

if (openModalBtn) {
    openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
});}

if (closeModalBtn) {
    closeModalBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });
}

if (modal?.dataset.openonError === "1") {
    modal.style.display = "block";
}

//options on: companies.index, employees.index

const optionsBtn = document.getElementById('more-options-btn');
const options = document.getElementById('more-options');
if (optionsBtn) {
    optionsBtn.addEventListener("click", () => {
        options.classList.toggle("hidden");
        if (options.classList.contains('hidden')) {
            optionsBtn.innerHTML = `<p>Show more options</p><span class="mt-2 md:-rotate-90 md:mt-1 md:ml-1">&#129175;</span>`
        } else {
            optionsBtn.innerHTML = `<p>Show fewer options</p><span class="mb-1 rotate-180 md:rotate-90 md:mt-1.5 md:-ml-1">&#129175;</span>`
        }
    });
}
if (smallOpenModalBtn) {
    smallOpenModalBtn.addEventListener("click", () => {
        modal.style.display = "block";
    });
}