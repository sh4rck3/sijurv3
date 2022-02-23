
<?php
echo '<div id="modal-ver'. $r->id .'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
?>
<div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Detalhes do registro Nº: <?= $r->id ?></h5>
        </div>
        <div class="modal-body" >
            <b>Numero do registro:</b> <?= $r->id?><br>
            <b>Codigo do escritorio:</b> <?= $r->cod_escritorio?><br>
            <b>Nome do escritorio:</b> <?= $r->nome_escritorio?><br>
            <b>Recolhimento :</b> <?= $r->recolhi_bra_outr?><br>
            <b>Nº da remessa:</b> <?= $r->num_remessa?><br>
            <b>CNPJ:</b> <?= $r->num_gcpj?><br>
            <b>UF:</b> <?= $r->uf?><br>
            <b>Número do processo:</b> <?= $r->num_processo?><br>
            <b>Ação ajuizada?:</b> <?= $r->acao_ajuizada?><br>
            <b>Réu/Autor:</b> <?= $r->reu_autor?><br>
            <b>Empresa Banco:</b> <?= $r->empresa_banco?><br>
            <b>Cliente:</b> <?= $r->nome_cliente?><br>
            <b>CPF / CNPJ:</b> <?= $r->cpf_cnpj?><br>
            <b>NDBCNG:</b> <?= $r->ndbqcng?><br>
            <b>CDBQCNG:</b> <?= $r->cdbqcng?><br>
            <b>Agência:</b> <?= $r->agencia?><br>
            <b>Conta:</b> <?= $r->conta?><br>
            <b>Contrato:</b> <?= $r->contrato?><br>
            <b>Descrição:</b> <?= $r->descricao_despesas?><br>
            <b>Valor:</b> <?= $r->valor?><br>
            <b>Carteira:</b> <?= $r->carteira?><br>
            <b>Quantidade de dias:</b> <?= $r->quant_dias?><br>
            <b>Distância:</b> <?= $r->distancia?><br>
            <b>Cod.Barras:</b> <?= $r->codigo_barras?><br>
            <b>Tipo de Guia:</b> <?= $r->tipo_guia?><br>
            <b>Data do vencimento:</b> <?= $r->data_vencimento?><br>
            <b>Duplicidade:</b> <?= $r->duplicidade?><br>
            <b>Justificativa da duplicidade:</b> <?= $r->justifi_duplicidade?><br>
            
            
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Fechar</button>
            
        </div>

<?php    
echo '</div>';
?>
