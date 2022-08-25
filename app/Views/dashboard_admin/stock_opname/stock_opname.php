<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <h1 class="app-page-title">Stock Opname</h1>
    <div class="row">
        <div class="col-lg-4">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row g-4 mb-4">
                        <div class="col-lg-12">
                            <form action="/stock-opname-filter" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control mb-3" id="tanggal_mulai" value="<?= $tgl_mulai ?>" name="tanggal_mulai" placeholder="Tanggal" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control mb-3" id="tanggal_akhir" value="<?= $tgl_akhir ?>" name="tanggal_akhir" placeholder="Tanggal" required>
                                    </div>
                                </div>
            
                                <label for="cabang" class="form-label">Cabang</label>
                                <select class="form-select mb-3" id="cabang" name="cabang" required>
                                    <option value="" selected>Pilih Cabang</option>
                                    <?php foreach($data_cabang as $data) : ?>
                                        <option value="<?= $data['id_cabang'] ?>" <?= $cabang == $data['id_cabang'] ? 'selected' : null ?>><?= $data['nama_cabang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
            
                                <button type="submit" class="btn btn-primary text-white mt-2">Rekam Stok</button>
                            </form>
                        </div>
                        <!--//col-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row g-4 mb-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="example4" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Tgl</th>
                                            <th class="cell">Nota</th>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Jasa</th>
                                            <th class="cell">Total</th>
                                            <th class="cell">Bayar</th>
                                            <th class="cell">Ket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data_table as $data) : ?>
                                        <tr>
                                            <td><?= date('d M Y', strtotime($data['created_at'])) ?></td>
                                            <td><?= $data['no_nota'] ?></td>
                                            <td class="text-capitalize"><?= $data['nama_customer'] ?></td>
                                            <td><?= $data['nama_layanan'] ?></td>
                                            <td><?= 'Rp '.number_format($data['total_order'], 0,',','.') ?></td>
                                            <td><?= 'Rp '.number_format($data['total_bayar'], 0,',','.') ?></td>
                                            <td></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--//col-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--//row-->

<script>
    var tbl = $('#example4');
    $(document).ready(function() {
        $('#example4').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    title: 'Stock Opname <?= date('d-m-Y', strtotime($tgl_mulai)) ?> s/d <?= date('d-m-Y', strtotime($tgl_akhir)) ?> <?= $data_cabang_name ? "(".$data_cabang_name['nama_cabang'].")" : '' ?>',
                    customize : function(doc){
                        var colCount = new Array();
                        $(tbl).find('tbody tr:first-child td').each(function(){
                            if($(this).attr('colspan')){
                                for(var i=1;i<=$(this).attr('colspan');$i++){
                                    colCount.push('*');
                                }
                            }else{ colCount.push('*'); }
                        });
                        doc.content[1].table.widths = colCount;
                    }
                },
            ]
        });
    });
</script>
<?= $this->endSection() ?>