<style type="text/css">
    .modal {
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
<div class="dashboard-wrapper">
    <?php if(session()->getFlashdata('add')):?>
        <script type="text/javascript">
            toastr.success('Link Telah Di Generate');
            // $(document).ready(function(){
            //     swal("Tidak Dapat Menambahkan Data Karena Sudah ada data inputan sebelumnya", {icon: "warning",});     
            // });
        </script>
    <?php endif?>
    <?php if(session()->getFlashdata('edit')):?>
        <script type="text/javascript">
            toastr.success('Data Telah Diupdate');
            // $(document).ready(function(){
            //     swal("Tidak Dapat Menambahkan Data Karena Sudah ada data inputan sebelumnya", {icon: "warning",});     
            // });
        </script>
    <?php endif?>
    <?php if(session()->getFlashdata('delete')):?>
        <script type="text/javascript">
            toastr.success('Data Telah Dihapus');
            // $(document).ready(function(){
            //     swal("Tidak Dapat Menambahkan Data Karena Sudah ada data inputan sebelumnya", {icon: "warning",});     
            // });
        </script>
    <?php endif?>
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <?php
                $session = session();
            ?>
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="">
                <div class="card">
                    <!-- <h2 class="card-header">Selamat Datang, <?= $session->get('nama')?></h2> -->
                    <h5 class="card-header">Tabel CP Admin</h5>
                    <div class="card-body">
                    <div style="width: 100%; text-align: left; margin-bottom: 10px;">
                        <a href="#" data-toggle="modal" data-target="#modal-default">
                            <button type="button" class="btn btn-primary" style="background-color: green">
                                <i class="fas fa-phone" style="margin-right: 10px;"></i>
                                Tambah Contact Person
                            </button>
                        </a>
                    </div>
                        <!-- <h3 style="color: red;">Proses Copy Link Hanya Bisa Dilakukan Satu Kali !</h3> -->
                        <div class="table-responsive">
                            <table id="table-link" class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nomor Contact</th>
                                        <th>Nomor Digunakan</th>
                                        <th>Action</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 1;
                                    ?>
                                    
                                    <?php foreach($contact as $v):?>                         
                                        <tr>
                                            <td><?= $i?></td>    
                                            <td><?= $v->no_hp?></td>
                                            <td>
                                                <input id="inputEmail2" disabled="" type="checkbox" name="is_valuable" <?php if($v->is_use == 1):?>checked="checked"<?php endif?> required="" style="width: 18px; height: 18px;" data-parsley-type="email" placeholder="Nama Hadiah" class="form-control">
                                            </td>
                                            <td>
                                                <a href="#" class="btn-edit" data-id="<?= $v->id;?>" data-no_hp="<?= $v->no_hp;?>" data-is_use="<?= $v->is_use;?>"><i class="fas fa-pencil-alt mr-2"></i></a>
                                                <a href="#" class="btn-delete" data-id="<?= $v->id;?>" ><i class="fas fa-trash mr-2"></i></a>
                                            </td>                            
                                        </tr>
                                        <?php
                                            $i = $i + 1;
                                        ?>
                                    <?php endforeach?>     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
            </div>
        </div>
        <div class="modal fade col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" id="modal-default">
            <div class="card">
                <h5 class="card-header">Tambah Contact Person</h5>
                <div class="card-body">
                    <form id="form" data-parsley-validate="" method="post" action="<?= base_url('/add_contact')?>">
                        <div class="form-group row">
                            <label for="inputEmail2" class="col-3 col-lg-3 col-form-label text-left">Nomor HP Admin</label>
                            <div class="col-9 col-lg-9">
                                <input id="inputEmail2" type="number" name="hp_admin" required="" data-parsley-type="email" placeholder="No HP Admin" class="form-control">
                            </div>
                            <label for="inputEmail2" class="col-3 col-lg-3 col-form-label text-left">Gunakan Nomor Ini</label>
                            <div class="" style="place-content: left; padding-top: 9px; padding-left: 10px;">
                                <input id="inputEmail2" type="checkbox" name="is_use" style="width: 18px; height: 18px;" data-parsley-type="email" placeholder="Nama Hadiah" class="form-control">
                            </div>
                        </div>
                        <div class="row pt-2 pt-sm-5 mt-1">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                
                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                    <a href="<?= base_url('/contact')?>" class="btn btn-space btn-secondary" style="color: #ffffff">Cancel</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" id="modal-edit">
            <div class="card">
                <h5 class="card-header">Edit Contact Person</h5>
                <div class="card-body">
                    <form id="form" data-parsley-validate="" method="post" action="<?= base_url('/edit_contact')?>">
                        <div class="form-group row">
                            <label for="inputEmail2" class="col-3 col-lg-3 col-form-label text-left">Nomor HP Admin</label>
                            <div class="col-9 col-lg-9">
                                <input id="inputEmail2" type="number" name="hp_admin" required="" data-parsley-type="email" placeholder="No HP Admin" class="form-control no_hp">
                            </div>
                            <label for="inputEmail2" class="col-3 col-lg-3 col-form-label text-left">Gunakan Nomor Ini</label>
                            <div id="cb_value" class="" style="place-content: left; padding-top: 9px; padding-left: 10px;">
                                <input id="inputEmail2" type="checkbox" name="is_use" style="width: 18px; height: 18px;" data-parsley-type="email" placeholder="Nama Hadiah" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="id" class="id_contact">
                        <div class="row pt-2 pt-sm-5 mt-1">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                
                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                    <a href="<?= base_url('/contact')?>" class="btn btn-space btn-secondary" style="color: #ffffff">Cancel</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>        
    </div>
</div>
<script>
    function myFunction(btn) {
      /* Get the text field */
        var copyText = $(btn).attr('data-url');
        navigator.clipboard.writeText(copyText).then(() => {
            alert('Text copied to clipboard');
        }).catch(err => {
            alert('Error in copying text: ', err);
        });
        var id = $('#url_').val();
        var urls= "<?php echo base_url('/link');?>";

        // $.ajax({
        //     url:"<?php echo base_url('/update_is_copy');?>",
        //     method:"POST",
        //     data:{id:id},
        //     dataType:"JSON",
        //     success:function(data)
        //     {

        //     }
        // });
        // window.location = urls;
    //   /* Select the text field */
    //   copyText.select();
    //   copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    //   /* Copy the text inside the text field */
    //   navigator.clipboard.writeText(copyText.value);
    
      /* Alert the copied text */
    //   alert("Copied the text: " + copyText);
    }
    $(document).ready(function(){
        $('.btn-edit').on('click',function(){
            var html = '';
            const no_hp = $(this).data('no_hp');
            const is_use = $(this).data('is_use');
            const id = $(this).data('id');
            $('.id_contact').val(id);
            $('.no_hp').val(no_hp);
            // alert ("This is an alert dialog box");  
            if(is_use == 1){
                html += '<input id="inputEmail2" type="checkbox" name="is_use" checked="checked" style="width: 18px; height: 18px;" data-parsley-type="email" placeholder="Nama Hadiah" class="form-control">';
            } else {
                html += '<input id="inputEmail2" type="checkbox" name="is_use" style="width: 18px; height: 18px;" data-parsley-type="email" placeholder="Nama Hadiah" class="form-control">';
            }
            $('#cb_value').html(html);
            $('#modal-edit').modal('show');
        });

        $('.btn-delete').on('click',function(){
            const id = $(this).data('id');
            $('.id_hadiah').val(id);
            // alert ("This is an alert dialog box");  
            $('#modal-del').modal('show');
        });
    });
</script>