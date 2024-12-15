const drawer = document.querySelectorAll('.drawer')
const dropdowns = document.querySelectorAll('.dropdown')
const close = document.querySelector('.close')
const sidebar = document.querySelector('.sidebar').classList
const tabs = document.querySelectorAll('.tab')
const alertBtn = document.querySelectorAll('.alert button')
const collapseBtn = document.querySelectorAll('.button-collapse')

const openTab = function () {
	const targetActive = document.querySelector('.tab-content.active').classList
	const tabActive = document.querySelector('.tab.active').classList
	const targetAttr = this.getAttribute('target')
	const targetEl = document.querySelector(targetAttr).classList

	tabActive.remove('active')
	this.classList.add('active')

	targetActive.remove('active')
	targetEl.add('active')
}

const openDropdown = function () {
	const target = document.querySelector(this.getAttribute('target')).classList

	target.contains('active') ? target.remove('active') : target.add('active')
}

const closeAlert = function () {
	console.log('obj');
}

const collapse = function () {
	const target = document.querySelector(this.getAttribute('target')).classList

	target.contains('block') ? target.remove('block') : target.add('block')
}

tabs.forEach(tab => tab.onclick = openTab)
dropdowns.forEach(dropdown => {
	const toggle = dropdown.querySelector('.toggle')

	toggle.onclick = openDropdown
})
alertBtn.forEach(btn => btn.onclick = closeAlert)
collapseBtn.forEach(btn => btn.onclick = collapse)

drawer.onclick = () => {
	sidebar.add('block')
}
close.onclick = () => {
	sidebar.remove('block')
}