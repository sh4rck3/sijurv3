<?php

if(!empty($_SESSION['success'])){

  if(!empty($_SESSION['valorTemporario'])){
     
    unset($_SESSION['success']);
    unset($_SESSION['valorTemporario']);
  }else{
      $_SESSION['valorTemporario'] = 1;
  }
}

if(!empty($_SESSION['error'])){

  if(!empty($_SESSION['valorTemporario'])){
     
    unset($_SESSION['error']);
    unset($_SESSION['valorTemporario']);
  }else{
      $_SESSION['valorTemporario'] = 1;
  }
}

?>
<div id="content">
<!--start-top-serch-->
  <div id="content-header">  
<!-- New Bem-vindos -->
   <div class="bemv">Dashboard</div>
      <div id="breadcrumb">
        <a href="<?= base_url() ?>" title="Dashboard" class="tip-bottom"> Início</a>
        <?php if ($this->uri->segment(1) != null) { ?>
            <a href="<?= base_url() . 'index.php/' . $this->uri->segment(1) ?>" class="tip-bottom" title="<?= ucfirst($this->uri->segment(1)); ?>">
              <?= ucfirst($this->uri->segment(1)); ?>
            </a>
          <?php if ($this->uri->segment(2) != null) { ?>
            <a href="<?= base_url() . 'index.php/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) ?>" class="current tip-bottom" title="<?= ucfirst($this->uri->segment(2)); ?>">
              <?= ucfirst($this->uri->segment(2)); } ?>
            </a>
          <?php } ?>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <?php if ($var = $this->session->flashdata('success')): ?><script>swal("Sucesso!", "<?php echo str_replace('"', '', $var); ?>", "success");</script><?php endif; ?>
          <?php if ($var = $this->session->flashdata('error')): ?><script>swal("Falha!", "<?php echo str_replace('"', '', $var); ?>", "error");</script><?php endif; ?>
          <?php if (isset($view)) { echo $this->load->view($view, null, true); } ?>
        </div>
      </div>
    </div>
  </div>
