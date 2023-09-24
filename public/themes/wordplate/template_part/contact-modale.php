<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nathalie Motta</title>
</head>
<body>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" data-text="TACTCON" id="myModalLabel"></h5>
        </div>
        <div class="modal-body">
          <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="traitement-formulaire">
            <div class="form-group">
              <label for="name">Nom</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse e-mail">
            </div>
            <div class="form-group">
              <label for="ref-photo-input">Réf photo</label><!-- Updated the "for" attribute to match the input id -->
              <input type="text" class="form-control" id="ref-photo-input" name="ref-photo" placeholder="Réf">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
