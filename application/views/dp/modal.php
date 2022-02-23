
<?php
echo '<div id="modal-ver'. $r->idCdl .'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Detalhes do registro Nº: <?= $r->idCdl ?></h5>
        </div>
        <div class="modal-body">
            <b>Numero do registro:</b> <?= $r->idCdl?><br>
            <b>Nome do escritório:</b> <?= $r->NOME_DO_ESCRITORIO ?><br>
            <b>Numero da remessa:</b> <?= $r->REMESSA_N ?><br>
            <b>Cod. de causa E-Xyon:</b> <?= $r->COD_CAUSA_EXYON ?><br>
            <b>Tipo de ação:</b> <?= $r->TIPO_DE_ACAO ?><br>
            <b>Número do processo:</b> <?= $r->N_DO_PROCESSO ?><br>
            <b>Nome do Cliente:</b> <?= $r->NOME_DO_CLIENTE ?><br>
            <b>CPF/CNPJ:</b> <?= $r->CPF_CNPJ_CLIENTE ?><br>
            <b>Comarca:</b> <?= $r->UF ?><br>
            <b>Descrição:</b> <?= $r->DESCRICAO_DAS_CUSTAS_DES ?><br>
            <b>Valor:</b> R$ <?= number_format($r->VALOR, 2, ',', '.') ?><br>
            <b>Data da despesa:</b> <?= $r->DATA_DA_DESPESA ?><br>
            <b>Responsável:</b> <?= $r->responsavel ?><br>
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Fechar</button>
            
        </div>

<?php    
echo '</div>';
?>
