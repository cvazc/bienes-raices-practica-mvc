document.addEventListener("DOMContentLoaded", function () {
	eventListeners()
	darkMode()
})

function darkMode() {
	const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)")
	if (prefiereDarkMode.matches) {
		document.body.classList.add("dark-mode")
	} else {
		document.body.classList.remove("dark-mode")
	}

	prefiereDarkMode.addEventListener("change", function () {
		if (prefiereDarkMode.matches) {
			document.body.classList.add("dark-mode")
		} else {
			document.body.classList.remove("dark-mode")
		}
	})

	const botonDarkMode = document.querySelector(".dark-mode-boton")
	botonDarkMode.addEventListener("click", function () {
		document.body.classList.toggle("dark-mode")
	})
}

function eventListeners() {
	const mobileMenu = document.querySelector(".mobile-menu")
	mobileMenu.addEventListener("click", navegacionResponsive)

	//Muestra campos condicionales
	const metodoContacto = document.querySelectorAll(
		'input[name="contacto[contacto]"]'
	)
	metodoContacto.forEach((input) =>
		input.addEventListener("click", mostrarMetodosContacto)
	)
}

function navegacionResponsive() {
	const navegacion = document.querySelector(".navegacion")
	navegacion.classList.toggle("mostrar")
}

function mostrarMetodosContacto(e) {
	const contactoDiv = document.querySelector("#contacto")
	if (e.target.value === "telefono") {
		contactoDiv.innerHTML = `
        <label for="telefono">Teléfono</label>
        <input id="telefono" type="tel" placeholder="Tu Telefono" name="contacto[telefono]">

        <p>Eliga la fecha y hora para la llamada</p>
		<label for="fecha">Fecha</label>
		<input id="fecha" type="date" name="contacto[fecha]">

		<label for="hora">Hora</label>
		<input id="hora" type="time" min="09:00" max="18:00" name="contacto[hora]">
        `
	} else {
		contactoDiv.innerHTML = `
        <label for="email">E-mail</label>
		<input id="email" type="email" placeholder="Tu Email" name="contacto[email]">
        `
	}
}
