import './bootstrap';

if (document.querySelector('#order-form')) {
const currency = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP', minimumFractionDigits: 0 });
const serviceTabs = document.querySelectorAll('.service-tab');
const laundryFields = document.querySelector('#laundry-fields');
const waterFields = document.querySelector('#water-fields');
const formHeading = document.querySelector('#form-heading');
const orderNumber = document.querySelector('.order-number');
const summaryIcon = document.querySelector('#summary-icon');
const summaryService = document.querySelector('#summary-service');
const summaryQuantity = document.querySelector('#summary-quantity');
const summaryLines = document.querySelector('#summary-lines');
const orderTotal = document.querySelector('#order-total');
const waterFulfillment = document.querySelector('#water-fulfillment');
const addressField = document.querySelector('#address-field');
const toast = document.querySelector('#toast');
let activeService = 'laundry';

function currentChoice() { return document.querySelector(activeService === 'laundry' ? '[data-group="laundry-service"] .selected' : '[data-group="water-type"] .selected'); }
function getQuantity() { return Number(document.querySelector(activeService === 'laundry' ? '#laundry-quantity' : '#water-quantity').value) || 1; }
function formatCurrency(amount) { return currency.format(amount).replace('₱', 'Php '); }
function updateSummary() {
	const choice = currentChoice();
	const quantity = getQuantity();
	const price = Number(choice.dataset.price);
	const serviceName = choice.dataset.label;
	const unit = activeService === 'laundry' ? 'load' : 'gallon';
	const addOns = activeService === 'laundry' ? [...document.querySelectorAll('[data-addon]:checked')] : [];
	const baseAmount = price * quantity;
	const addOnAmount = addOns.reduce((total, addOn) => total + Number(addOn.dataset.price) * quantity, 0);
	summaryService.textContent = serviceName;
	summaryQuantity.textContent = `${quantity} ${unit}${quantity === 1 ? '' : 's'}`;
	summaryIcon.textContent = activeService === 'laundry' ? '✦' : '◈';
	summaryLines.innerHTML = `<div><span>${serviceName} × ${quantity}</span><strong>${formatCurrency(baseAmount)}</strong></div>`;
	addOns.forEach((addOn) => summaryLines.insertAdjacentHTML('beforeend', `<div><span>${addOn.dataset.addon}</span><strong>${formatCurrency(Number(addOn.dataset.price) * quantity)}</strong></div>`));
	orderTotal.textContent = formatCurrency(baseAmount + addOnAmount);
}
serviceTabs.forEach((tab) => tab.addEventListener('click', () => {
	activeService = tab.dataset.service;
	serviceTabs.forEach((item) => { const isActive = item === tab; item.classList.toggle('active', isActive); item.setAttribute('aria-selected', String(isActive)); });
	const isLaundry = activeService === 'laundry';
	laundryFields.hidden = !isLaundry; waterFields.hidden = isLaundry;
	formHeading.textContent = isLaundry ? 'Laundry service' : 'Water refill';
	orderNumber.textContent = isLaundry ? '#L-1048' : '#W-2287';
	updateSummary();
}));
document.querySelectorAll('.choice-card').forEach((card) => card.addEventListener('click', () => { card.closest('[data-group]').querySelectorAll('.choice-card').forEach((choice) => choice.classList.remove('selected')); card.classList.add('selected'); updateSummary(); }));
document.querySelectorAll('[data-step]').forEach((button) => button.addEventListener('click', () => { const input = button.parentElement.querySelector('input'); input.value = Math.max(Number(input.min) || 1, Number(input.value || 1) + Number(button.dataset.step)); updateSummary(); }));
document.querySelectorAll('#laundry-quantity, #water-quantity, [data-addon]').forEach((input) => input.addEventListener('input', updateSummary));
waterFulfillment.addEventListener('change', () => { addressField.hidden = waterFulfillment.value !== 'Delivery'; });
document.querySelector('#clear-order').addEventListener('click', () => { document.querySelector('#order-form').reset(); document.querySelectorAll('.choice-card.selected').forEach((card) => card.classList.remove('selected')); document.querySelector('[data-group="laundry-service"] .choice-card').classList.add('selected'); document.querySelector('[data-group="water-type"] .choice-card').classList.add('selected'); addressField.hidden = true; updateSummary(); });
document.querySelector('#order-form').addEventListener('submit', (event) => { event.preventDefault(); if (!event.currentTarget.reportValidity()) return; const customer = document.querySelector('#customer-name').value; toast.textContent = `${activeService === 'laundry' ? 'Laundry' : 'Water'} order for ${customer} created and ready for receipt printing.`; toast.classList.add('show'); window.setTimeout(() => toast.classList.remove('show'), 3500); });
updateSummary();
}

const themeKey = 'laundrypos-theme';
const themeNames = { blue: 'Blue', light: 'Light', dark: 'Dark', green: 'Green', red: 'Red' };

function applyTheme(theme) {

	document.body.classList.remove('theme-blue', 'theme-light', 'theme-dark', 'theme-green', 'theme-red');

	document.body.classList.add(`theme-${theme}`);

	const selectedTheme = document.querySelector(`[data-theme-choice][value="${theme}"]`);

	if (selectedTheme) {
		selectedTheme.checked = true;
	}

	const status = document.querySelector('#theme-status');

	if (status) {
		status.textContent = `${themeNames[theme] || themeNames.blue} selected`;
	}
}

function initializeTheme() {
	const savedTheme = localStorage.getItem(themeKey) || 'blue';
	const theme = themeNames[savedTheme] ? savedTheme : 'blue';

	applyTheme(theme);
	document.querySelectorAll('[data-theme-choice]').forEach((choice) => {
		choice.addEventListener('change', () => {
			localStorage.setItem(themeKey, choice.value);
			applyTheme(choice.value);
		});
	});
}

if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', initializeTheme);
} else {
	initializeTheme();
}
