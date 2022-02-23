

<div class="container" style="margin-left: 0px; background-color: whitesmoke; border-radius: 10px; width: 100%;">
    <h2>Importador de Remessa CSV</h2>
    <?php 
    //var_dump($qstring);
    if(!empty($status1 )){
        echo '<div class="alert alert-info">'.$status1.'</div>';
                
    }
   if(!empty($status2 )){
        echo '<div class="alert alert-danger">'.$status2.'</div>';
                
    }
    if(!empty($status3 )){
        echo '<div class="alert alert-success">'.$status3.'</div>';
                
    }
    
    ?>
    <div class="panel panel-default" >
    	
        <div class="panel-body">
            <form action="<?php echo site_url("dp/upload_fileBradesco");?>" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="Importar">
            </form>
            <table class="table table-bordered" >
                <thead>
                    <tr>
                      <th>ID-Interno</th>
                      <th>Código</th>
                      <th>Escritorio</th>
                      <th>Recolhimento BRA OUT</th>
                      <th>Nº Remessa</th>
                      <th>GCPJ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get rows query
                    $query = $this->db->query("SELECT * FROM bradesco ORDER BY id DESC LIMIT 3")->result();
                    if(count($query)>0){
                    foreach($query as $row){ ?>
                    <tr>
                      <td><?php echo $row->id; ?></td>
                      <td><?php echo $row->cod_escritorio; ?></td>
                      <td><?php echo $row->nome_escritorio; ?></td>
                      <td><?php echo $row->recolhi_bra_outr; ?></td>
                      <td><?php echo $row->num_remessa; ?></td>
                      <td><?php echo $row->num_gcpj; ?></td>
                    </tr>
                    
                    
                    <?php } }else{ ?>
                    <tr><td colspan="5">Nenhum registro encontrado</td></tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
        
    </div>
    <div>
            <form action="<?php echo site_url("dp/delete_fileBradesco");?>" method="post"  id="deletForm" enctype="multipart/form-data">
                <label>Excluir remessa: </label>
                <input type="text" name="num_remessa" placeholder="Numero da remessa" />
                <input type="submit" class="btn btn-primary" name="deleteForm" value="Deleta" onclick="return confirm('Confirma a exclusão deste registro?')">
            </form>
        </div>
    
    
    
    <div>
        <br>
        <p>Layou para importação das remessas:<br>
        
            Para realizar a umportação, utilize o layout disponibilizado, salve o aquivo como CSV separando as colunas por virgula<br>
        desta forma, e so importar o arquivo selecionado.</p>
        <a href="http://ti.dunice.net/wp-content/uploads/2022/02/layout.csv" >Layout </a>
        <br>
        <a class="btn btn-primary" href="http://sijur.dunice.net/index.php/dp">Voltar</a>
    </div>
    
    <br><br>
    <div>
            <form action="<?php echo site_url("dp/delete_idBradesco");?>" method="post"  id="deletForm" enctype="multipart/form-data">
                <label>Excluir ID: </label>
                <input type="text" name="id" placeholder="Identificação" />
                <input type="submit" class="btn btn-primary" name="deleteForm" value="Deletar" onclick="return confirm('Confirma a exclusão deste ID?')">
            </form>
        </div>
</div>

