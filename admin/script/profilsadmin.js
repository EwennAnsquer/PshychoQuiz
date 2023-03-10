$(document).ready(function() {
    $('.bouttontab').on('click', function() {
        var action = $(this).data('action');
        var id = $(this).data('id');
        
        if (action == 'modifier') {
            // Envoyer une requête AJAX pour récupérer les informations de l'enregistrement
            // et afficher un formulaire de modification.
            
        } else if (action == 'supprimer') {
            // Envoyer une requête AJAX pour supprimer l'enregistrement.
            $.ajax({
                type: 'POST',
                url: 'supprimer.php',
                data: {'id': id},
                success: function(response) {
                    // Rafraîchir la page pour afficher les modifications.
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});