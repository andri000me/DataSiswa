<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <!-- /.col -->
    <div class="col-md-4 col-xs-12">
      <div class="info-box bg-red">
        <span class="info-box-icon bg-dark-red"><i class="fa fa-male"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">SISWA LAKI-LAKI</span>
          <span class="info-box-number"> <?php echo $jeniskelaminl ?> </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-4 col-xs-12">
      <div class="info-box bg-blue">
        <span class="info-box-icon bg-dark-blue"><i class="fa fa-male"></i><i class="fa fa-female"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">TOTAL SISWA</span>
          <span class="info-box-number"><?php echo $jeniskelamins ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon bg-dark-green"><i class="fa fa-female"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">SISWA PEREMPUAN</span>
          <span class="info-box-number"><?php echo $jeniskelaminp ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <div class="row">
        <div class="container-fluid">
          <div class="pull-left">
            <i class="fa fa-graduation-cap"></i><h3 class="box-title">Tabel Siswa</h3>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-success" name="" value="Tambah Siswa" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Tambah Siswa</button>
            <br>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="table-responsive">
        <table class="table" id="mydata">
          <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tangggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Kota Asal</th>
            <th>Action</th>
          </tr>
          <?php
    				foreach($pelajar as $i): ?>
          <tr>
            <td><?=$i->NIS;?></td>
            <td><?=$i->nama;?></td>
            <td><?=$i->tanggal_lahir;?></td>
            <td><?=$i->jenis_kelamin;?></td>
            <td><?=$i->alamat;?></td>
            <td><?=$i->nama_kota;?></td>
            <td>
                <a data-toggle="modal" data-target="#modal_edit<?= $i->NIS;?>" class="btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i>
                </a>
                <a href="<?=base_url('index.php/website/hapus/'.$i->NIS)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin?')">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
          </tr>
          <?php endforeach;?>
        </table>
      </div>
    </div>
  </div>
    <!-- /.box-body -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Siswa</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/website/tambah')?>" method="post" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">NIS</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="NIS" name="NIS">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Nama" name="nama">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tanggal_lahir">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-8">
              <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki <br>
              <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Alamat" name="alamat">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Kota Asal</label>
            <div class="col-sm-8">
              <select class="form-control" name="kota_asal" required>
                  <option value=""></option>
                  <option value="1">Jombang</option>
                  <option value="2">Malang</option>
                  <option value="3">Surabaya</option>
                  <option value="4">Blitar</option>
                  <option value="5">Jember</option>
                  <option value="6">Tuban</option>
                  <option value="7">Gresik</option>
                  <option value="8">Banyuwangi</option>
                  <option value="9">Kediri</option>
                  <option value="10">Mojokerto</option>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Simpan" name="tambahdata">
        </form>
      </div>
    </div>
  </div>
  </div>

  <?php
      foreach($pelajar as $i):
  ?>
  <div class="modal fade" id="modal_edit<?= $i->NIS?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Data Siswa</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'index.php/website/ubah'?>" method="post" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">NIS</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="NIS" name="NIS" value="<?= $i->NIS;?>>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= $i->nama;?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tanggal_lahir" value="<?= $i->tanggal_lahir;?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-8">
                <input type="radio" name="jenis_kelamin" value="Laki-laki" value="<?= $i->jenis_kelamin;?>"> Laki-laki <br>
                <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $i->alamat;?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Kota Asal</label>
            <div class="col-sm-8">
              <select class="form-control" name="kota_asal" required>
                  <option value=""></option>
                  <option value="1">Jombang</option>
                  <option value="2">Malang</option>
                  <option value="3">Surabaya</option>
                  <option value="4">Blitar</option>
                  <option value="5">Jember</option>
                  <option value="6">Tuban</option>
                  <option value="7">Gresik</option>
                  <option value="8">Banyuwangi</option>
                  <option value="9">Kediri</option>
                  <option value="10">Mojokerto</option>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Ubah" name="ubahdata">
        </form>
      </div>
    </div>
  </div>
  </div>
  <?php endforeach;?>
</section>
