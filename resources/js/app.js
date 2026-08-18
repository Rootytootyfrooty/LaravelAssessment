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
const singleDeleteConfirmArray = document.getElementsByClassName('delete-confirmation-msg');
const singleDeleteConfirm = singleDeleteConfirmArray[0];
if (closeModalBtn) {
    closeModalBtn.addEventListener("click", () => {
        modal.classList.add('opacity-0', '-translate-y-4', 'translate-x-4');
        modal.classList.remove('opacity-100', 'translate-y-0', 'translate-x-0');
        if (singleDeleteConfirm) {
            singleDeleteConfirm.classList.add('opacity-0');
            singleDeleteConfirm.classList.add('hidden');
            singleDeleteConfirm.classList.remove('opacity-100', '-translate-x-1/2');
        }
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    });
}
//idk if this does anything any more
if (modal?.dataset.openonError === "1") {
    modal.classList.remove('hidden');
}

//for the mobile view
if (smallOpenModalBtn) {
    smallOpenModalBtn.addEventListener("click", () => {
        modal.classList.remove('hidden');

        setTimeout(() => {
            modal.classList.remove('opacity-0', '-translate-y-4', 'translate-x-4');
            modal.classList.add('opacity-100', 'translate-y-0', 'translate-x-0');
        }, 100);
    });
}

//edit modal from index
const urlParams = new URLSearchParams(window.location.search);

if (urlParams.get('trigger') === 'modal') {
    modal.classList.remove('hidden');

    setTimeout(() => {
        modal.classList.remove('opacity-0', '-translate-y-4', 'translate-x-4');
        modal.classList.add('opacity-100', 'translate-y-0', 'translate-x-0');
    }, 100);
}


//sorting options styling on: companies.index, employees.index
const optionsBtn = document.getElementById('more-options-btn');
const options = document.getElementById('more-options');
const optionText = document.getElementById('option-text');
const chevron = document.getElementById('chevron');

if (optionsBtn) {
    optionsBtn.addEventListener("click", () => {
        chevron.classList.toggle("rotate-180");
        chevron.classList.toggle("mt-[6px]");
        options.classList.toggle("hidden");
        chevron.classList.toggle("mt-1");
        // console.log(optionText.textContent);
        if (options.classList.contains('hidden')) {
            optionText.textContent = "More Options";
        } else {
            optionText.textContent = "Fewer Options";
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

//error message
const errorMsg = document.getElementById('error-msg');

if (errorMsg) {
    errorMsg.classList.remove('opacity-0');
    errorMsg.classList.add('opacity-100', '-translate-x-1/2');
    setTimeout(() => {
        errorMsg.style.display = 'none';
    }, 3000);
}

//company show employee accordion
const employeeShow = document.getElementById('employee-show');
const employeeAll = document.getElementById('employee-all');


if (employeeShow) {
    employeeShow.addEventListener("click", () => {
        chevron.classList.toggle('rotate-180');
        chevron.classList.toggle('mb-1');
        if (employeeAll.style.maxHeight) {
            employeeAll.style.maxHeight = null;
        } else {
            employeeAll.style.maxHeight = employeeAll.scrollHeight + 'px';
        }
    });
}

//delete company from index modal
const deleteConfirm = document.querySelectorAll('.delete-confirmation-msg');
const deleteCompanyBtn = document.querySelectorAll('.delete-company');
const cancelDeleteBtn = document.querySelectorAll('.cancel-delete');
const editCompanyBtn = document.querySelectorAll('.open-modal');

if (deleteCompanyBtn) {
    for (let i = 0; i < deleteCompanyBtn.length; i++) {
        deleteCompanyBtn[i].addEventListener("click", () => {
            deleteConfirm[i].classList.remove('hidden');
            setTimeout(() => {
                deleteConfirm[i].classList.remove('opacity-0');
                deleteConfirm[i].classList.add('opacity-100', '-translate-x-1/2');
            }, 50);
        });
    }
    for (let i = 0; i < cancelDeleteBtn.length; i++) {
        cancelDeleteBtn[i].addEventListener("click", () =>{
            deleteConfirm[i].classList.add('opacity-0');
            deleteConfirm[i].classList.add('hidden');
            deleteConfirm[i].classList.remove('opacity-100', '-translate-x-1/2');
        });
    }
    for (let i = 0; i < editCompanyBtn.length; i++) {
        editCompanyBtn[i].addEventListener("click", () => {
            modal.classList.remove('hidden');

            setTimeout(() => {
                modal.classList.remove('opacity-0', '-translate-y-4', 'translate-x-4');
                modal.classList.add('opacity-100', 'translate-y-0', 'translate-x-0');
            }, 100);
        });
    }
}

//clear search

const searchBox = document.getElementById("search");
const clearSearch = document.getElementById("clear-search");

if (searchBox) {
    clearSearch.addEventListener("click", () => {
        searchBox.value = "";
    });
}