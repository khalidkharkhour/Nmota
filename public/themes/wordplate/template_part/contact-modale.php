

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " data-text="TACTCONTACT" id="myModalLabel"> </h5>
      </div>
      <div class="modal-body " >
        <form action="/contact" method="post">
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom">
          </div>
          <div class="form-group">
            <label for="email"> E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse e-mail">
          </div>
          <div class="form-group">
            <label for="text"> Réf photo</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Réf">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </div>
  </div>
</div>
