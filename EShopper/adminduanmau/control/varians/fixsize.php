<div class="container-fluid">
    <?php 
    if(isset($_GET["id"]) && $_GET["id"] ){
        $id = $_GET["id"];
        $color=showonesize($id);
    }
    ?>
<form method="post" action="index.php?act=fixsize" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Color</label>
    <input type="hidden" value="<?php echo $id?>" name='id'>
    <input type="text" class="form-control" value="<?php echo $color[0]['name']?>" name='size' id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">sửa</button>
</form>
</div>