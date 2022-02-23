<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Informações do Juridico3</h5>
            </div>
            <?php
                         //var_dump($total_contratosUF);
                        if($porMesEncerrado != null){
                                    foreach ($porRegional as $c) {
                                       
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$c->regional.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/juridico3/gerenciarPainel?pesquisaPainel='.$c->regional.'"><b>'.$c->QT.'</b></a></td>';
                                                                                                   
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
                <h5>Feitos</h5>
            </div>
            <?php
                         //var_dump($total_contratosUF);
                        if($feitosj3Painel != null){
                                    foreach ($feitosj3Painel as $c) {
                                       
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$c->responsavel.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/juridico3/gerenciarPainelfeitos?pesquisaPainel='.$c->responsavel.'"><b>'.$c->QT.'</b></a></td>';
                                                                                                   
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