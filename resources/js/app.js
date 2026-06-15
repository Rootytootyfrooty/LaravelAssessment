const openModalBtn = document.getElementById('open-modal');
const modal = document.getElementById('modal');
const closeModalBtn = document.getElementById('close-modal');
const smallOpenModalBtn = document.getElementById('open-modal-small')

//modals on: employees.index, companies.index, company/id, employee/id
if (openModalBtn) {
    openModalBtn.addEventListener("click", () => {
        modal.classList.remove('hidden');

        setTimeout(() => {
            modal.classList.remove('opacity-0', '-translate-y-4', 'translate-x-4');
            modal.classList.add('opacity-100', 'translate-y-0', 'translate-x-0');
        }, 100);
    });
}

if (closeModalBtn) {
    closeModalBtn.addEventListener("click", () => {
        modal.classList.add('opacity-0', '-translate-y-4', 'translate-x-4');
        modal.classList.remove('opacity-100', 'translate-y-0', 'translate-x-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    });
}
//idk if this does anything any more
if (modal?.dataset.openonError === "1") {
    modal.style.display = "block";
}

//for the mobile view
if (smallOpenModalBtn) {
    smallOpenModalBtn.addEventListener("click", () => {
        modal.style.display = "block";
    });
}

//sorting options styling on: companies.index, employees.index
const optionsBtn = document.getElementById('more-options-btn');
const options = document.getElementById('more-options');
if (optionsBtn) {
    optionsBtn.addEventListener("click", () => {
        options.classList.toggle("hidden");
        if (options.classList.contains('hidden')) {
            optionsBtn.innerHTML = `More Options<span aria-hidden="true" class="mt-2 md:-rotate-90 md:mt-1 md:ml-1">&#129175;</span>`
        } else {
            optionsBtn.innerHTML = `Fewer Options<span aria-hidden="true" class="mb-1 rotate-180 md:rotate-90 md:mt-1.5 md:-ml-1">&#129175;</span>`
        }
    });
}

//success message timeout/transition
const successMsg = document.getElementById('success-msg');

if (successMsg) {
    successMsg.classList.remove('opacity-0');
    successMsg.classList.add('opacity-100', '-translate-x-1/2');
    setTimeout(() => {
        successMsg.style.display = 'none';
    }, 3000);
}