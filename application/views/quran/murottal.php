 <!-- Begin Page Content -->
        <div class="main-content">
          <section class="section">

          <div class="section-header">
            <i class="fas fa-volume-up"></i><h1 class="ml-3"><?= $title; ?></h1>
          </div>

          <?= $this->session->flashdata('message'); ?>

          <div class="card my-3 shadow-sm">
            <div class="card-body alert-warning">
              <h2 class="card-title text-center">Manfaat Mendengarkan Bacaan Al Quran</h2>
              <hr>
              <p class="card-text">Al quran merupakan <i>kitab suci</i> umat islam yang memiliki berbagai manfaat dan mukzizat bagi orang yang mempelajarinya. Mempelajari al quran dapat dilakukan dengan berbagai cara diantaranya adalah dengan membacanya, memahami dan mengamalkan isi kandungan yang ada di dalamnya dan juga dengan cara menghafalkannya. Selain itu, hanya dengan mendengarkan bacaannya saja, kita sudah bisa merasakan berbagai manfaat yang terkandung di dalamnya. Hal itu terjadi karena bunyi bacaan al quran memiliki gelombang suara dengan frekuensi dan panjang gelombang tertentu yang dengan itu dapat mempengaruhi otak secara positif dan dapat mengembalikan keseimbangaannya. Hal ini tentu dapat memberikan dampak positif bagi tubuh manusia diantaranya adalah dapat melawan berbagai penyakit dan mendukung kekebalan tubuh yang kuat. Mendengarkan bacaan al quran juga terbukti dapat <i>merelaksasi otak</i> menjadi lebih tenang yang tentu dengan hal itu dapat memberikan banyak hal positif bagi tubuh. Berikut kami sajikan beberapa manfaat dari mendengarkan bacaan al quran:
                <ul class="text-left">
                  <li>Meningkatkan Kekebalan Tubuh</li>
                  <li>Meningkatkan Kreatifitas</li>
                  <li>Meningkatkan Kemampuan Konsentrasi</li>
                  <li>Dapat Mengubah Perilaku Orang Lain Menjadi Lebih Baik</li>
                  <li>Menciptakan Ketenangan dan Menyembuhkan Ketegangan Saraf</li>
                  <li>Dapat Menghilangkan Rasa Gelisah dan Juga Stress</li>
                  <li>Dapat Meningkatkan dan Memperkuat Kepribadian Diri</li>
                </ul>
              Hal itu baru sedikit dari <i>khasiat mendengarkan bacaan al quran</i> dan tentu masih banyak lagi manfaat yang terkandung di dalamnya yang sedang di teliti oleh para ilmuwan baik oleh ilmuwan muslim maupun non muslim. Pada intinya mendengarkan bacaan al quran dapat memberikan berbagai manfaat yang baik bagi kesehatan tubuh dan juga mental manusia. Belum lagi dengan pahala yang didapatkan dari mendengarkan bacaan tersebut yang tentu akan sangat bermanfaat bagi umat islam nantinya. Oleh karena itu, yuk kita ganti kebiasaan kita dalam mendengarkan musik kepada mendengarkan bacaan quran.
              </p>
            </div>
            <div class="card-footer text-muted alert-success">
            <div class="row">
            <div class="col-lg mt-3">
                <form action="<?= base_url('quran/murottal'); ?>" method="post">
                  <div class="input-group mb-3">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari Murottal" autocomplete="off" autofocus="on">
                    <div class="input-group-append">
                      <input type="submit" name="submit" class="btn btn-warning">
                    </div>
                </form>
              </div>
              <?php if (empty($murottal)): ?>
                <td colspan="5">
                  <div class="alert alert-danger" role="alert">
                    Data Tidak Ditemukan.!
                  </div>
                </td>
              <?php endif ?>
            </div>
          </div>
          <h6 class="text-left">Hasil Pencarian : <?= $jumlah; ?></h6>
        </div>
        </div>

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <?php foreach($murottal as $m) : ?>
            <div class="col-xl-3 col-md-6 my-3">
              <div class="card border-left-primary shadow-sm py-2">
                <div class="card-body alert-info">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h6 font-weight-bold text-danger text-uppercase mb-1"><?= $m['judul']; ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Qary : <?= $m['qori']; ?></div>
                      <h6 class="card-text text-center mt-3"><audio class="col-md" src="<?= base_url('assets/audio/') . $m['file']; ?>" controls></audio></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

        </div>


        </section>
      </div>
        <!-- /.container-fluid -->