<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
  <main class="container">
    <div class="row border mt-4 p-4 shadow-lg p-3 mb-5 bg-white rounded">
      <div class="col">
        <div class="alert alert-info" role="alert" id="mensagem">
            <p><?php echo (isset($mensagem)? $mensagem :'');?></p>
        </div>
      </div>
    </div>
  </main>