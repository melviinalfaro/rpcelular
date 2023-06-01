const body = document.querySelector("body");
const sidebar = body.querySelector("nav");
const toggle = body.querySelector(".toggle");
const modeSwitch = body.querySelector(".toggle-switch");
const modeText = body.querySelector(".mode-text");
const home = document.querySelector(".home");
const sidebarBtn = document.querySelector(".sidebarBtn");

// Verificar y establecer el estado del sidebar
const storedSidebarState = localStorage.getItem("sidebarState");
const isSidebarClosed = storedSidebarState === "closed";
sidebar.classList.toggle("close", isSidebarClosed);
home.style.marginLeft = isSidebarClosed ? "100px" : "270px";
sidebarBtn.innerHTML = sidebar.classList.contains("active")
    ? "menu"
    : "arrow_back";

// Evento de clic en el botón de alternar del sidebar
sidebarBtn.addEventListener("click", function () {
    sidebar.classList.toggle("active");
    const isSidebarOpen = sidebar.classList.contains("active");
    localStorage.setItem("isSidebarOpen", isSidebarOpen);
    sidebarBtn.innerHTML = isSidebarOpen ? "menu" : "arrow_back";
});

// Evento de clic en el botón de alternar del sidebar
toggle.addEventListener("click", function () {
    sidebar.classList.toggle("close");
    const isSidebarClosed = sidebar.classList.contains("close");
    localStorage.setItem("sidebarState", isSidebarClosed ? "closed" : "open");
    home.style.transition = "var(--tran-05)";
    home.style.marginLeft = isSidebarClosed ? "100px" : "270px";
});

// Verificar y establecer el modo oscuro
const storedMode = localStorage.getItem("mode");
const isDarkMode = storedMode === "dark";
body.classList.toggle("dark", isDarkMode);
modeText.innerText = isDarkMode ? "Claro" : "Oscuro";

// Evento de clic en el interruptor del modo oscuro
modeSwitch.addEventListener("click", function () {
    body.classList.toggle("dark");
    const isDarkMode = body.classList.contains("dark");
    modeText.innerText = isDarkMode ? "Claro" : "Oscuro";
    localStorage.setItem("mode", isDarkMode ? "dark" : "light");
});
