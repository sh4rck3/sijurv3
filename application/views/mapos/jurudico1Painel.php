<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Casos que tiveram </h5>
            </div>
            <?php
                         //var_dump($total_contratosUF);
                        if($porUsuario != null){
                                    foreach ($porUsuario as $c) {
                                       
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$c->divisaoFichas.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/juridico3/gerenciarPainelj1?pesquisaPainel='.$c->divisaoFichas.'"><b>'.$c->QT.'</b></a></td>';
                                                                                                   
                                                echo '<tr>';

                                            echo '</table>';
                            
                                        echo '</div>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
                        
                        ?>
        </div>
    </div>
    
</div>
<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Casos que tiveram andamento</h5>
            </div>
            <?php
                         //var_dump($total_contratosUF);
                        if($porUsuarioFeito != null){
                                    foreach ($porUsuarioFeito as $c) {
                                       
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$c->divisaoFichas.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/juridico3/getfeitosj1?pesquisaPainel='.$c->divisaoFichas.'"><b>'.$c->QT.'</b></a></td>';
                                                                                                   
                                                echo '<tr>';

                                            echo '</table>';
                            
                                        echo '</div>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
                        
                        ?>
        </div>
    </div>
    
</div>