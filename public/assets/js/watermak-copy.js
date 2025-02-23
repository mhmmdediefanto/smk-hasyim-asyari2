const APP_URL = document.querySelector('meta[name="app-url"]').content;

document.addEventListener("copy", async function (event) {
    let copiedText = window.getSelection().toString();
    let tambahan = `\n\nSumber: ${APP_URL}\n Copyright ©  SMK NU HASYIM ASY'ARI 2 KUDUS`;

    try {
        await navigator.clipboard.writeText(copiedText + tambahan);
        console.log("Teks telah dimodifikasi sebelum disalin!");
    } catch (err) {
        console.error("Gagal menyalin teks!", err);
    }

    event.preventDefault();
});
