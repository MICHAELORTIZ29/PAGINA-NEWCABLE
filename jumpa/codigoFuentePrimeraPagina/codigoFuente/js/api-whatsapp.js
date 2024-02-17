//codgio script para el icono de whatsapp 
function redirectToWhatsApp() {
    var phoneNumber = "957381166"; // Reemplaza con el número de teléfono de tu empresa
    var redirectURL = "https://api.whatsapp.com/send?phone=" + phoneNumber;
    window.open(redirectURL, "_blank");
}