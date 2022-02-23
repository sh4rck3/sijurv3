

<div class="container" style="margin-left: 0px;">
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
    <div class="panel panel-default">
    	
        <div class="panel-body" >
            <form action="<?php echo site_url("dp/upload_file");?>" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="Importar">
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>ID-Interno</th>
                      <th>Número do processo</th>
                      <th>Escritorio</th>
                      <th>Tipo de ação</th>
                      <th>Nº Remessa</th>
                      <th>Codigo do exyon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get rows query
                    $query = $this->db->query("SELECT * FROM cdl ORDER BY idCdl DESC LIMIT 3")->result();
                    if(count($query)>0){
                    foreach($query as $row){ ?>
                    <tr>
                      <td><?php echo $row->idCdl; ?></td>
                      <td><?php echo $row->N_DO_PROCESSO; ?></td>
                      <td><?php echo $row->NOME_DO_ESCRITORIO; ?></td>
                      <td><?php echo $row->TIPO_DE_ACAO; ?></td>
                      <td><?php echo $row->REMESSA_N; ?></td>
                      <td><?php echo $row->COD_CAUSA_EXYON; ?></td>
                    </tr>
                    
                    
                    <?php } }else{ ?>
                    <tr><td colspan="5">Nenhum registro encontrado</td></tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
        
    </div>
    <div >
            <form action="<?php echo site_url("dp/delete_file");?>" method="post"  id="deletForm" enctype="multipart/form-data">
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
        <a href="http://ti.dunice.net/wp-content/uploads/2021/05/cdl_layout.csv" >Layout </a>
        <br>
        <a class="btn btn-primary" href="http://sijur.dunice.net/index.php/dp">Voltar</a>
    </div>
    
    <br><br>
    <div>
            <form action="<?php echo site_url("dp/delete_id");?>" method="post"  id="deletForm" enctype="multipart/form-data">
                <label>Excluir ID: </label>
                <input type="text" name="id" placeholder="Identificação" />
                <input type="submit" class="btn btn-primary" name="deleteForm" value="Deletar" onclick="return confirm('Confirma a exclusão deste ID?')">
            </form>
        </div>
</div>

