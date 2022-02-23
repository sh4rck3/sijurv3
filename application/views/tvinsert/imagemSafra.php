

<div class="container">
    <div id="formulario" style="background-color: white; border-radius: 10px; width: 100%">    
        <h2><strong>Envio de imagens</strong></h2><hr>

        <form method="POST" enctype="multipart/form-data">
          <label for="conteudo">Enviar imagem:</label>
          <input type="file" name="pic" accept="image/*" class="form-control">

          <div align="center">
            <button type="submit" class="btn btn-success">Enviar imagem</button>
          </div>
        </form>

         <hr>
    </div>
 <?php
 if(isset($_FILES['pic']))
 {
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
   // $dir = './imagens/'; //Diretório para uploads
    $dir = FCPATH . 'assets' . DIRECTORY_SEPARATOR;
 
    //gravando no banco de dados
    
     $this->load->model('Os_model');
    $this->Os_model->anexarSafra('999', $new_name, base_url('assets' . DIRECTORY_SEPARATOR), '', $dir);
    
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo '<div class="alert alert-success" role="alert" align="center">
          <img src="' . base_url() . 'assets/'.$new_name.'" class="img img-responsive img-thumbnail" width="200"> 
          <br>
          Imagem enviada com sucesso!
          <br>
          <a href="http://sijur.dunice.net/index.php/vendas/imagemSafra">
          <button class="btn btn-default">Enviar nova imagem</button>
          </a></div>';
 } ?>

</div>



