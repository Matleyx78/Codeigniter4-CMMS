<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<script type="text/javascript">
    $(document).ready(function() {

        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';
        var scegli = '<option value="0">Scegli...</option>';
        var attendere = '<option value="0">Attendere...</option>';

        $("select#asst_id_sect").html(attendere);
        $("select#asst_id_sect").attr("disabled", "disabled");

        $("select#asst_id_buil").change(function() {
            var building = $("select#asst_id_buil option:selected").attr('value');
            //Make an Ajax request to a PHP script
            //This will return the data that we can add to our Select element.
            $.ajax({
                url: '<?php echo site_url('/cmms_assets/aj_sel_sect'); ?>',
                type: 'post',
                dataType: 'json',
                data: {
                    id_building: building,
                    [csrfName]: csrfHash,
                },
                success: function(response) {
                    $("select#asst_id_sect").removeAttr("disabled");
                    $("select#asst_id_sect").html(scegli);
                    //Log the data to the console so that
                    //you can get a better view of what the script is returning.
                    console.log(response);
                    $.each(response.result, function(i, item) {
                        //Use the Option() constructor to create a new HTMLOptionElement.
                        var option = new Option(item.sec_des, item.id_sect);
                        //Append the option to our Select element.
                        $("select#asst_id_sect").append(option);
                    });
                    csrfHash = response.csrfHash_new;
                }
            });
        });
    });
</script>




<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Aggiungi record
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-danger">
                            <?php if (!empty($errors)) : ?>
                                <?php foreach ($errors as $field => $error) : ?>
                                    <div class="text-danger"> <?= $error; ?> </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <?php echo form_open(site_url('/cmms_assets/save'), 'class="email"'); ?>
                        <!-- <form role="form" action="<?= site_url('/cmms_assets/save') ?>" method="post"> -->
                        <!-- <input type="hidden" name="csrf_token_name" value="749bc3871836c1ecb0b8f1570e79d7a4"> -->

                        <input type="hidden" name="matteo" class="form-control" value="txt">

                        <div class="row clearfix">
                            <div class="col-md-3"> <label class="form-label" for="asst_title">Asst Title</label>
                                <div class="form-group">
                                    <input type="text" name="asst_title" class="form-control" id="asst_title" placeholder="Asst Title">
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_description">Asst Description</label>
                                <div class="form-group">
                                    <input type="text" name="asst_description" class="form-control" id="asst_description" placeholder="Asst Description">
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_id_buil">Asst Id Buil</label>
                                <div class="form-group">
                                    <select name="asst_id_buil" id="asst_id_buil" class="form-control">
                                        <?php echo $cmms_buildings; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_id_sect">Asst Id Sect</label>
                                <div class="form-group">
                                    <select name="asst_id_sect" id="asst_id_sect" class="form-control">
                                        <option>Scegli...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-3"> <label class="form-label" for="asst_brand">Asst Brand</label>
                                <div class="form-group">
                                    <input type="text" name="asst_brand" class="form-control" id="asst_brand" placeholder="Asst Brand">
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_model">Asst Model</label>
                                <div class="form-group">
                                    <input type="text" name="asst_model" class="form-control" id="asst_model" placeholder="Asst Model">
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_targa">Asst Targa</label>
                                <div class="form-group">
                                    <input type="text" name="asst_targa" class="form-control" id="asst_targa" placeholder="Asst Targa">
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_frame_number">Asst Frame Number</label>
                                <div class="form-group">
                                    <input type="text" name="asst_frame_number" class="form-control" id="asst_frame_number" placeholder="Asst Frame Number">
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-3"> <label class="form-label" for="asst_serial_number">Asst Serial Number</label>
                                <div class="form-group">
                                    <input type="text" name="asst_serial_number" class="form-control" id="asst_serial_number" placeholder="Asst Serial Number">
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_tech_char">Asst Tech Char</label>
                                <div class="form-group">
                                    <input type="text" name="asst_tech_char" class="form-control" id="asst_tech_char" placeholder="Asst Tech Char">
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_fabbrication">Asst Fabbrication</label>
                                <div class="form-group">
                                    <input type="text" name="asst_fabbrication" class="form-control" id="asst_fabbrication" placeholder="Asst Fabbrication">
                                </div>
                            </div>
                            <div class="col-md-3"> <label class="form-label" for="asst_revision">Asst Revision</label>
                                <div class="form-group">
                                    <select name="asst_revision" class="form-control">
                                        <option value="0" selected="selected" class="form-control" id="asst_revision">No</option>
                                        <option value="1" class="form-control" id="asst_revision">Si</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6"> <label class="form-label" for="asst_note">Asst Note</label>
                                <div class="form-group">
                                    <input type="text" name="asst_note" class="form-control" id="asst_note" placeholder="Asst Note">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Salva
                            </button>
                        </div>
                        <!-- <div class="col-md-12 d-flex justify-content-between align-items-center">
			                    <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
			                    <button type="submit" id="submit" class="btn btn-primary btn-sm">Save</button>
			                </div> -->
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>