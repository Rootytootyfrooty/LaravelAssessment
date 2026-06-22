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
        modal.classList.remove('hidden');

        setTimeout(() => {
            modal.classList.remove('opacity-0', '-translate-y-4', 'translate-x-4');
            modal.classList.add('opacity-100', 'translate-y-0', 'translate-x-0');
        }, 100);
    });
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
        console.log(optionText.textContent);
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

