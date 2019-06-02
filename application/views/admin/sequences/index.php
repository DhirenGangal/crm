<style>
    .box-header>.box-tools {
        position: absolute;
        right: 40% !important;
        top: 3px !important;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Sequence Numbers</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sequence Numbers</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Sequence Numbers</h3>
               <div class="box-tools">
                   <form class="form-inline" method="get">
                   <div class="form-group">
                       <select class="form-control" name="member_id">
                           <option value="">--Select Member--</option>
                           <?php
                           if(!empty($members)){
                               foreach ($members as $k => $v){
                                   ?>
                           <option value="<?php echo $k  ?>" <?php echo !empty($_GET['member_id']) && ($_GET['member_id']==$k) ? 'selected=selected' : '';?>><?php echo $v; ?></option>
                           <?php
                               }
                           }
                           ?>
                       </select>
                       <button type="submit" class="btn btn-warning">Search</button>
                   </div>
                   </form>
               </div>
            </div>
            <div class="box-body">
                <?php
                if (!empty($sequences)) {
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Dealer</th>
                                <th>Sequence Profix</th>
                                <th>Series Start</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($sequences as $sequence) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $sequence['user_name']; ?></td>
                                    <td>
                                        <input type="text" value="<?php echo $sequence['prefix']; ?>"
                                               class="form-control prefix"/>
                                        <input type="hidden" value="<?php echo $sequence['member_id']; ?>"
                                               class="form-control member"/>
                                        <input type="hidden" value="<?php echo base_url('sequence/ajx/'); ?>" class="form-control url"/>
                                        <input type="hidden" value="<?php echo $sequence['pk_id']; ?>"
                                               class="form-control pk"/>

                                    </td>
                                    <td width="100">
                                        <input type="text" class="form-control start" <?php /*echo (!empty($sequence['series_start']) && $sequence['series_start'] >= 1) ? '' : '' */?> value="<?php echo !empty($sequence['series_start']) ? $sequence['series_start'] : 1; ?>"/>
                                    </td>
                                    <td width="300">
                                        <button type="button" class="btn btn-sm btn-success resetBtn">Save</button>
                                        <p class="msg"></p>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
</div>
<script>
    $(function () {

        var $dom1 = $(this).parent().siblings();
        $('.prefix').on('keyup', function () {
            $dom1.find('.resetBtn').attr('disabled', '');
        });
        $('.resetBtn').click(function () {
            var $dom = $(this).parent().siblings();
            var pref = $dom.find('.prefix').val();
            var url = $dom.find('.url').val();
            var member = $dom.find('.member').val();
            var start = $dom.find('.start').val();
            console.log(start);
            var pk = $dom.find('.pk').val();
            if (pref != '' && typeof pref != 'undefined') {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {prefix: pref, member: member, start: start, pk: pk},
                    success: function (data) {
                        console.log(data);
                        if (data.status == 200) {
                            console.log("200");
                            $dom.find('.msg').append("<span class='text-success'>Sequence set Successfully !</span>", 200);
                            setTimeout(function () {
                                $dom.find('.msg').fadeOut()
                            }, 500);
                        } else if (data.status == 409) {
                            console.log("409");
                            $dom.find('.msg').append("<span class='text-danger'>Sequence already exists !</span>", 200);
                            setTimeout(function () {
                                $dom.find('.msg').fadeOut()
                            }, 500);
                        } else if (data.status == 201) {
                            console.log("201");
                            $dom.find('.msg').text("<span class='text-info'>Sequence Updated !</span>", 200);
                            setTimeout(function () {
                                $dom.find('.msg').fadeOut()
                            }, 500);
                        }
                    }
                });
            }
        });
    });
</script>
            