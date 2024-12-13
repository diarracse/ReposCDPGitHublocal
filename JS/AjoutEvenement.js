document.getElementById('formEvenement').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('API/ajouterEvenement.php', {
        method: 'POST',
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            alert(data.message);
            if (data.status === 'success') {
                this.reset();
            }
        })
        .catch((error) => console.error('Erreur:', error));
});
