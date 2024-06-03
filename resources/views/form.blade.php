<form id="message-form">
    @csrf
    <div class="form-group">
        <label for="email">Adresse e-mail <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre e-mail" required>
    </div>
    <div class="form-group">
        <label for="message">Message <span class="text-danger">*</span></label>
        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Entrez votre message" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Ajouter une image (optionnel)</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('message-form').addEventListener('submit', function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        axios.post('/', formData)
            .then(function(response) {
                console.log(response.data);
                alert('Message envoyé avec succès!');
                // Redirection ou autre action après l'envoi du message
            })
            .catch(function(error) {
                console.error(error);
                alert('Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.');
                // Affichage d'un message d'erreur à l'utilisateur
            });
    });
</script>
